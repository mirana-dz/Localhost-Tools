<?php

namespace App\Libraries\Torrent;

/**
 * This class provides a way to decode a bencoded torrent file
 * and access certain metadata about it.
 *
 * @package App\Libraries\Torrent
 */
class TorrentBencode
{
    /**
     * The current position of the parser in the torrent data.
     *
     * @var int
     */
    protected int $position = 0;

    /**
     * The raw bencoded data of the torrent file.
     *
     * @var string
     */
    protected string $torrentData;

    /**
     * The decoded data of the torrent file.
     *
     * @var array
     */
    protected array $decodedData;

    /**
     * Creates a new TorrentBencode instance.
     */
    function __construct()
    {
    }

    /**
     * Decodes the bencoded data of the given file and sets the decoded data.
     *
     * @param string $fileName The name of the torrent file to decode.
     * @return bool Returns true if the file was decoded successfully, false otherwise.
     */
    public function decodeFile(string $fileName): bool
    {
        if (!is_file($fileName)) return false;

        $this->torrentData = file_get_contents($fileName);
        $this->decodedData = $this->decode();
        return true;
    }

    /**
     * Decodes the torrent data.
     *
     * @return float|array|string|null Returns a float, array, string or null value.
     */
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

    /**
     * Decodes a dictionary.
     *
     * @return array Returns an associative array.
     */
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

    /**
     * Decodes a string.
     *
     * @return string|null Returns a string or null value.
     */
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

    /**
     * Decodes a list.
     *
     * @return array Returns a numerically indexed array.
     */
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

    /**
     * Decodes an integer.
     *
     * @return float Returns a float value.
     */
    private function decodeInteger(): float
    {
        $this->position++;
        $digits = strpos($this->torrentData, 'e', $this->position) - $this->position;
        $val = round((float)substr($this->torrentData, $this->position, $digits));
        $this->position += $digits + 1;
        return $val;
    }

    /**
     * Decodes the given bencoded data and sets the decoded data.
     *
     * @param string $fileData The bencoded data to decode.
     * @return bool Returns true if the data was decoded successfully, false otherwise.
     */
    public function decodeData(string $fileData): bool
    {
        // if (!is_file($fileName)) return false;

        $this->torrentData = $fileData;
        $this->decodedData = $this->decode();
        return true;
    }

    /**
     * Decodes the given bencoded string data and sets the decoded data.
     *
     * @param string $stringData The bencoded string data to decode.
     * @return bool Returns true if the data was decoded successfully, false otherwise.
     */
    public function decodeStringData(string $stringData): bool
    {
        $this->torrentData = $stringData;
        $this->decodedData = $this->decode();
        return true;
    }

    /**
     * Returns the publisher of the torrent file.
     *
     * @return string|null Returns the publisher of the torrent file, or null if it is not present.
     */
    public function getPublisher(): ?string
    {
        return $this->decodedData['publisher'] ?? null;
    }

    /**
     * Returns the URL of the publisher of the torrent file.
     *
     * @return string|null Returns the URL of the publisher of the torrent file, or null if it is not present.
     */
    public function getPublisherUrl(): ?string
    {
        return $this->decodedData['publisher-url'] ?? null;
    }

    /**
     * Returns the creator of the torrent file.
     *
     * @return string|null Returns the creator of the torrent file, or null if it is not present.
     */
    public function getCreatedBy(): ?string
    {
        return $this->decodedData['created by'] ?? null;
    }

    /**
     * Returns the creation date of the torrent file.
     *
     * @return int|null Returns the creation date of the torrent file as a Unix timestamp, or null if it is not present.
     */
    public function getCreationDate(): ?int
    {
        return $this->decodedData['creation date'] ?? null;
    }

    /**
     * Check if the torrent is private.
     *
     * @return bool True if the torrent is private.
     */
    public function isPrivate(): bool
    {
        return isset($this->decodedData['info']['private']) && $this->decodedData['info']['private'] == 1;
    }

    /**
     * Get the size of the torrent.
     *
     * @return int The size of the torrent.
     */
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

    /**
     * Get the hexadecimal representation of the info hash.
     *
     * @return string The hexadecimal representation of the info hash.
     */
    public function getHexInfoHash(): string
    {
        return pack('H*', $this->getInfoHash());
    }

    /**
     * Get the info hash of the torrent.
     *
     * @return string The info hash of the torrent.
     */
    public function getInfoHash(): string
    {
        return sha1($this->encode($this->decodedData['info']));
    }

    /**
     * Encode the given data to bencode format.
     *
     * @param mixed $data The data to be encoded.
     * @return string The encoded data.
     */
    public function encode(mixed $data): string
    {
        return match (gettype($data)) {
            'array' => ($this->encodeArray($data)),
            'string' => ($this->encodeString($data)),
            'integer', 'double' => ($this->encodeInteger($data)),
            // default => //TODO
        };
    }

    /**
     * Encode the given array to bencode format.
     *
     * @param array $array The array to be encoded.
     * @return string The encoded array.
     */
    private function encodeArray(array $array): string
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

    /**
     * Encode the given string to bencode format.
     *
     * @param string $string The string to be encoded.
     * @return string The encoded string.
     */
    private function encodeString(string $string): string
    {
        return (strlen($string) . ':' . $string);
    }

    /**
     * Encodes an integer as a string in the format used by BitTorrent.
     *
     * @param int $integer The integer to encode.
     * @return string The encoded integer.
     */
    private function encodeInteger(int $integer): string
    {
        return ('i' . $integer . 'e');
    }

    /**
     * Returns a magnet link for the BitTorrent file.
     *
     * @return string The magnet link.
     */
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

    /**
     * Returns the name of the BitTorrent file.
     *
     * @return string The name of the file.
     */
    public function getName(): string
    {
        if (isset($this->decodedData['info']['name.utf-8'])) {
            return $this->decodedData['info']['name.utf-8'];
        }

        return $this->decodedData['info']['name'];
    }

    /**
     * Returns the announce URL for the BitTorrent file.
     *
     * @return string|null The announce URL, or null if not present.
     */
    public function getAnnounce(): ?string
    {
        return $this->decodedData['announce'] ?? null;
    }

    /**
     * Returns the comment for the BitTorrent file.
     *
     * @return string The comment.
     */
    public function getComment(): string
    {
        return $this->decodedData['comment'];
    }

    /**
     * Returns the first tracker URL in the announce-list for the BitTorrent file.
     *
     * @return string The tracker URL.
     */
    public function getAnnounceList(): string
    {
        return $this->decodedData['announce-list'][0];
    }

    /**
     * Returns the source URL for the BitTorrent file.
     *
     * @return string|null The source URL, or null if not present.
     */
    public function getSource(): ?string
    {
        return $this->decodedData['info']['source'] ?? null;
    }

    /**
     * Returns an array of file metadata for the BitTorrent file.
     *
     * @return array An array containing the file count, total size, and a list of files.
     */
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

    /**
     * Returns the raw data of the torrent in JSON format.
     *
     * @return string The JSON-encoded raw data of the torrent.
     */
    public function getRawData(): string
    {
        $rawData = utf8Encode($this->getData());
        return (json_encode($rawData));
    }

    /**
     * Returns the raw data of the torrent.
     *
     * @return string The raw data of the torrent.
     */
    public function getData(): string
    {
        return $this->torrentData;
    }
}