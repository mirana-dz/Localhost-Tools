<?php

namespace App\Vendor;

class ReverseHashLookup
{

    // md5, sha1
    public function reverseMd5Hash($hash): array
    {
        $reverseGromWeb = $this->reverseGromWeb($hash, 'md5');
        $md5Decrypt = $this->md5Decrypt($hash, 'md5');
        $hashToolKit = $this->hashToolKit($hash);
        return array($reverseGromWeb, $md5Decrypt, $hashToolKit);
    }

    // md4, md5, sha1, sha256, sha384, sha512, sha512, ntlm ...
    //TODO https://md5decrypt.net/Api/
    public function reverseGromWeb($hash, $algorithm): string
    {
        $url = match ($algorithm) {
            'md5' => 'https://md5.gromweb.com/?md5=' . $hash,
            'sha1' => 'https://sha1.gromweb.com/?hash=' . $hash,
        };
        $getHtml = httpsGetRequest($url);
        $result = stripos($getHtml, 'was succesfully reversed into the string:');

        if ($result == false) return 'no reverse string was found.';
        $start = stripos($getHtml, '<em class="long-content string">');
        $end = stripos($getHtml, '</em>', $start);
        $start = $start + 32;
        $length = $end - $start;
        $htmlSection = substr($getHtml, $start, $length);

        return htmlspecialchars($htmlSection);
    }

    // md5, sha1, sha256, sha384, sha512 
    public function md5Decrypt($hash, $algorithm): string
    {
        $url = match ($algorithm) {
            'md4' => 'https://md5decrypt.net/Md4/',
            'md5' => 'https://md5decrypt.net',
            'sha1' => 'https://md5decrypt.net/Sha1/',
            'sha256' => 'https://md5decrypt.net/Sha256/',
            'sha384' => 'https://md5decrypt.net/Sha384/',
            'sha512' => 'https://md5decrypt.net/Sha512/',
            'ntlm' => 'https://md5decrypt.net/Ntlm/',
        };
        $getHtml = httpsPostRequest($url, 'hash=' . $hash . '&decrypt=D%25C3%25A9crypter');
        $result = stripos($getHtml, $hash . ' : ');

        if ($result == false) return 'Sorry, this hash is not in our database.';

        $start = stripos($getHtml, $hash . ' :');
        $end = stripos($getHtml, '</b>', $start);
        $start = match ($algorithm) {
            'md4', 'md5' => $start + 38,
            'sha1' => $start + 46,
            'sha256' => $start + 71,
            'sha384' => $start + 103,
            'sha512' => $start + 135,
            'ntlm' => $start + 39,
        };
        $length = $end - $start;
        $htmlSection = substr($getHtml, $start, $length);

        return htmlspecialchars($htmlSection);
    }

    public function hashToolKit($hash): string
    {
        $url = 'https://hashtoolkit.com/decrypt-hash/?hash=' . $hash;
        $getHtml = httpsGetRequest($url);
        $result = stripos($getHtml, 'Decrypt  Hash Results for:');

        if ($result == false) return 'No hashes found.';

        $start = stripos($getHtml, 'Hashes for:');
        $end = stripos($getHtml, '</code>', $start);
        $start = $start + 18;
        $length = $end - $start;
        $htmlSection = substr($getHtml, $start, $length);

        return htmlspecialchars($htmlSection);
    }

    public function reverseSha1Hash($hash): array
    {
        $reverseGromWeb = $this->reverseGromWeb($hash, 'sha1');
        $md5Decrypt = $this->md5Decrypt($hash, 'sha1');
        $hashToolKit = $this->hashToolKit($hash);
        return array($reverseGromWeb, $md5Decrypt, $hashToolKit);
    }

    public function reverseSha256Hash($hash): array
    {
        $md5Decrypt = $this->md5Decrypt($hash, 'sha256');
        $hashToolKit = $this->hashToolKit($hash);
        return array($md5Decrypt, $hashToolKit);
    }

    public function reverseSha384Hash($hash): array
    {
        $md5Decrypt = $this->md5Decrypt($hash, 'sha384');
        $hashToolKit = $this->hashToolKit($hash);
        return array($md5Decrypt, $hashToolKit);
    }

    public function reverseSha512Hash($hash): array
    {
        $md5Decrypt = $this->md5Decrypt($hash, 'sha512');
        $hashToolKit = $this->hashToolKit($hash);
        return array($md5Decrypt, $hashToolKit);
    }

    /*//TODO
    function reverseLMHash($hash): array
    {
    }*/

    public function reverseNTLMHash($hash): array
    {
        $md5Decrypt = $this->md5Decrypt($hash, 'ntlm');
        return array($md5Decrypt);
    }
}