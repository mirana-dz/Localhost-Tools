<?php

namespace App\Vendor;

class TorrentBencode
{
    protected int $position = 0;
    protected string $torrentData;
    protected array $decodedData;

    function __construct()
    {

    }

    public function decodeFile($fileName): bool
    {
        if (!is_file($fileName)) return false;

        $this->torrentData = file_get_contents($fileName);
        $this->decodedData = $this->decode();
        return true;
    }

    protected function decode(): float|array|string|null
    {
        if ($this->position >= strlen($this->torrentData)) {
            return null;
        }

        return match ($this->torrentData[$this->position]) {
            'd' => ($this->decodeDictionary()),
            'l' => ($this->decodeList()),
            'i' => ($this->decodeInteger()),
            default => ($this->decodeString()),
        };
    }

    private function decodeDictionary(): array
    {
        $this->position++;
        $retval = array();

        while ($this->torrentData[$this->position] != 'e') {
            $key = $this->decodeString();
            $val = $this->decode();

            if ($key === null || $val === null)
                break;

            $retval[$key] = $val;
        }

        $retval['isDct'] = true;
        $this->position++;
        return $retval;
    }

    private function decodeString(): ?string
    {
        $digits = strpos($this->torrentData, ':', $this->position) - $this->position;

        if ($digits < 0 || $digits > 20)
            return null;

        $len = (int)substr($this->torrentData, $this->position, $digits);
        $this->position += $digits + 1;
        $str = substr($this->torrentData, $this->position, $len);
        $this->position += $len;
        return $str;
    }

    private function decodeList(): array
    {
        $this->position++;
        $retval = array();

        while ($this->torrentData[$this->position] != 'e') {
            $val = $this->decode();
            if ($val === null)
                break;
            $retval[] = $val;
        }

        $this->position++;
        return $retval;
    }

    private function decodeInteger(): float
    {
        $this->position++;
        $digits = strpos($this->torrentData, 'e', $this->position) - $this->position;
        $val = round((float)substr($this->torrentData, $this->position, $digits));
        $this->position += $digits + 1;
        return $val;
    }

    public function decodeData($fileData): bool
    {
        // if (!is_file($fileName)) return false;

        $this->torrentData = $fileData;
        $this->decodedData = $this->decode();
        return true;
    }

    public function decodeStringData($stringData): bool
    {
        $this->torrentData = $stringData;
        $this->decodedData = $this->decode();
        return true;
    }

    public function getPublisher(): ?string
    {
        return $this->decodedData['publisher'] ?? null;
    }

    public function getPublisherUrl(): ?string
    {
        return $this->decodedData['publisher-url'] ?? null;
    }

    public function getCreatedBy(): ?string
    {
        return $this->decodedData['created by'] ?? null;
    }

    public function getCreationDate(): ?int
    {
        return $this->decodedData['creation date'] ?? null;
    }

    public function isPrivate(): bool
    {
        return isset($this->decodedData['info']['private']) && $this->decodedData['info']['private'] == 1;
    }

    public function getSize(): int
    {
        $cur_size = 0;

        if (!isset($this->decodedData['info']['files'])) {
            $cur_size = $this->decodedData['info']['length'];
        } else {
            foreach ($this->decodedData['info']['files'] as $file) {
                $cur_size += $file['length'];
            }
        }

        return $cur_size;
    }

    public function getHexInfoHash(): string
    {
        return pack('H*', $this->getInfoHash());
    }

    public function getInfoHash(): string
    {
        return sha1($this->encode($this->decodedData['info']));
    }

    public function encode($data)
    {
        return match (gettype($data)) {
            'array' => ($this->encodeArray($data)),
            'string' => ($this->encodeString($data)),
            'integer', 'double' => ($this->encodeInteger($data)),
            // default => //TODO
        };
    }

    private function encodeArray($array): string
    {
        $return = 'l';
        $isDict = false;

        if (isset($array['isDct']) && $array['isDct'] === true) {
            $isDict = 1;
            $return = 'd';
            // this is required by the specs, and BitTornado actualy chokes on unsorted dictionaries
            ksort($array, SORT_STRING);
        }

        foreach ($array as $key => $value) {
            if ($isDict) {
                // skip the isDct element, only if it's set by us
                if ($key == 'isDct' and is_bool($value)) continue;
                $return .= strlen($key) . ':' . $key;
            }

            $return .= $this->encode($value);

        }

        return $return . 'e';
    }

    private function encodeString($string): string
    {
        return (strlen($string) . ':' . $string);
    }

    private function encodeInteger($integer): string
    {
        return ('i' . $integer . 'e');
    }

    public function getMagnet(): string
    {
        $magnet = 'magnet:?xt=urn:btih:';
        $magnet .= $this->getInfoHash();
        $magnet .= '&dn=';
        $magnet .= $this->getName();
        $magnet .= '&tr=';
        $magnet .= urlencode($this->getAnnounce());
        return $magnet;
    }

    public function getName()
    {
        if (isset($this->decodedData['info']['name.utf-8'])) {
            return $this->decodedData['info']['name.utf-8'];
        }

        return $this->decodedData['info']['name'];
    }

    public function getAnnounce(): ?string
    {
        return $this->decodedData['announce'] ?? null;
    }

    public function getComment()
    {
        return $this->decodedData['comment'];
    }

    public function getAnnounceList()
    {
        return $this->decodedData['announce-list'][0];
    }

    public function getSource(): ?string
    {
        return $this->decodedData['info']['source'] ?? null;
    }

    public function fileList(): array
    {
        $decodedData = $this->decodedData;
        $FileCount = 0;
        $FileList = array();
        if (!isset($decodedData['info']['files'])) // Single file mode
        {
            $FileCount = 1;
            $TotalSize = $decodedData['info']['length'];
            $FileList[] = array('size' => $decodedData['info']['length'], 'name' => $decodedData['info']['name']);
        } else { // Multiple file mode
            $FileNames = array();
            $TotalSize = 0;
            $Files = $decodedData['info']['files'];
            foreach ($Files as $File) {
                $FileCount++;
                $TotalSize += $File['length'];
                $FileSize = $File['length'];

                $FileName = ltrim(implode('/', $File['path']), '/');

                $FileList[] = array('size' => $FileSize, 'name' => $FileName);
                $FileNames[] = $FileName;
            }
            array_multisort($FileNames, $FileList);
        }
        return array('file_count' => $FileCount, 'total_size' => $TotalSize, 'files' => $FileList);
    }

    public function getRawData(): string
    {
        $rawData = utf8Encode($this->getData());
        return (json_encode($rawData));
    }

    public function getData(): string
    {
        return $this->torrentData;
    }
}