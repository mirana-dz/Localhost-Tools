<?php

namespace App\Libraries;

use Exception;

/**
 * ReverseHashLookup class is used to reverse different types of hash values and return the corresponding original values.
 */
class ReverseHashLookup
{

    /**
     * This method reverses a given MD5 hash using different web tools.
     *
     * @param string $hash The hash value to be reversed.
     * @return array Returns an array of three elements: the reverse string from gromweb.com, decrypted MD5 value from md5decrypt.net, and decrypted hash from hashtoolkit.com.
     * @throws Exception
     */
    public function reverseMd5Hash(string $hash): array
    {
        $reverseGromWeb = $this->reverseGromWeb($hash, 'md5');
        $md5Decrypt = $this->md5Decrypt($hash, 'md5');
        $hashToolKit = $this->hashToolKit($hash);
		$nitrxgenMd5Db = $this->nitrxgenMd5Db($hash);
        return array($reverseGromWeb, $md5Decrypt, $hashToolKit, $nitrxgenMd5Db);
    }

    /**
     * This method reverses a given hash using gromweb.com.
     *
     * @param string $hash The hash value to be reversed.
     * @param string $algorithm The algorithm used to generate the hash value.
     * @return string Returns the reversed string value for the hash.
     * @throws Exception
     */
    public function reverseGromWeb(string $hash, string $algorithm): string
    {
        $url = match ($algorithm) {
            'md5' => 'https://md5.gromweb.com/?md5=' . $hash,
            'sha1' => 'https://sha1.gromweb.com/?hash=' . $hash,
            default => throw new Exception("Unsupported algorithm type: $algorithm"),
        };
        $getHtml = httpsGetRequest($url);
        $result = stripos($getHtml, 'was succesfully reversed into the string:');

        if (!$result) return 'no reverse string was found.';
        $start = stripos($getHtml, '<em class="long-content string">');
        $end = stripos($getHtml, '</em>', $start);
        $start = $start + 32;
        $length = $end - $start;
        $htmlSection = substr($getHtml, $start, $length);

        return htmlspecialchars($htmlSection);
    }

    /**
     * This method decrypts a given hash value using md5decrypt.net.
     *
     * @param string $hash The hash value to be decrypted.
     * @param string $algorithm The algorithm used to generate the hash value.
     * @return string Returns the decrypted value of the hash.
     * @throws Exception
     */
    public function md5Decrypt(string $hash, string $algorithm): string
    {
        $url = match ($algorithm) {
            'md4' => 'https://md5decrypt.net/Md4/',
            'md5' => 'https://md5decrypt.net',
            'sha1' => 'https://md5decrypt.net/Sha1/',
            'sha256' => 'https://md5decrypt.net/Sha256/',
            'sha384' => 'https://md5decrypt.net/Sha384/',
            'sha512' => 'https://md5decrypt.net/Sha512/',
            'ntlm' => 'https://md5decrypt.net/Ntlm/',
            default => throw new Exception("Unsupported algorithm type: $algorithm"),
        };
        $getHtml = httpsPostRequest($url, 'hash=' . $hash . '&decrypt=D%25C3%25A9crypter');
        $result = stripos($getHtml, $hash . ' : ');

        if (!$result) return 'Sorry, this hash is not in our database.';

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

    /**
     * This method returns the decrypted value of a given hash using hashtoolkit.com.
     *
     * @param string $hash The hash value to be decrypted.
     * @return string Returns the decrypted value of the hash.
     * @throws Exception
     */
    public function hashToolKit(string $hash): string
    {
        $url = 'https://hashtoolkit.com/decrypt-hash/?hash=' . $hash;
        $getHtml = httpsGetRequest($url);
        $result = stripos($getHtml, 'Decrypt  Hash Results for:');

        if (!$result) return 'No hashes found.';

        $start = stripos($getHtml, 'Hashes for:');
        $end = stripos($getHtml, '</code>', $start);
        $start = $start + 18;
        $length = $end - $start;
        $htmlSection = substr($getHtml, $start, $length);

        return htmlspecialchars($htmlSection);
    }

    /**
     * Retrieves the plaintext value of an MD5 hash from the Nitrxgen MD5 database.
     *
     * @param string $hash The MD5 hash to search for in the database.
     * @return string The plaintext value of the hash, or an error message if the hash is not found.
     * @throws Exception
     */
    public function nitrxgenMd5Db(string $hash): string
    {
        // TODO https://www.nitrxgen.net/md5db_info/#api
        $url = 'https://www.nitrxgen.net/md5db/' . $hash;
        $getHtml = httpsGetRequest($url);
        if ($getHtml != '') {
            return htmlspecialchars($getHtml);
        } else {
            return 'Sorry, this hash is not in our database.';
        }
    }

    /**
     * This method reverses a given SHA1 hash using different web tools.
     *
     * @param string $hash The hash value to be reversed.
     * @return array Returns an array of three elements: the reverse string from gromweb.com, decrypted SHA1 value from md5decrypt.net, and decrypted hash from hashtoolkit.com.
     * @throws Exception
     */
    public function reverseSha1Hash(string $hash): array
    {
        $reverseGromWeb = $this->reverseGromWeb($hash, 'sha1');
        $md5Decrypt = $this->md5Decrypt($hash, 'sha1');
        $hashToolKit = $this->hashToolKit($hash);
        return array($reverseGromWeb, $md5Decrypt, $hashToolKit);
    }

    /**
     * This method decrypts a given SHA256 hash using md5decrypt.net and returns the decrypted value and the decrypted hash from hashtoolkit.com.
     *
     * @param string $hash The hash value to be decrypted.
     * @return array Returns an array of two elements: the decrypted value of the hash and the decrypted hash value.
     * @throws Exception
     */
    public function reverseSha256Hash(string $hash): array
    {
        $md5Decrypt = $this->md5Decrypt($hash, 'sha256');
        $hashToolKit = $this->hashToolKit($hash);
        return array($md5Decrypt, $hashToolKit);
    }

    /**
     * This method decrypts a given SHA384 hash using md5decrypt.net and returns the decrypted value and the decrypted hash from hashtoolkit.com.
     *
     * @param string $hash The hash value to be decrypted.
     *
     * @return array Returns an array of two elements: the decrypted value of the hash and the decrypted hash value.
     * @throws Exception
     */
    public function reverseSha384Hash(string $hash): array
    {
        $md5Decrypt = $this->md5Decrypt($hash, 'sha384');
        $hashToolKit = $this->hashToolKit($hash);
        return array($md5Decrypt, $hashToolKit);
    }

    /**
     * This method decrypts a given SHA512 hash using md5decrypt.net and returns the decrypted value and the decrypted hash from hashtoolkit.com.
     *
     * @param string $hash The hash value to be decrypted.
     * @return array Returns an array of two elements: the decrypted value of the hash and the decrypted hash value.
     * @throws Exception
     */
    public function reverseSha512Hash(string $hash): array
    {
        $md5Decrypt = $this->md5Decrypt($hash, 'sha512');
        $hashToolKit = $this->hashToolKit($hash);
        return array($md5Decrypt, $hashToolKit);
    }

    /*//TODO
    function reverseLMHash($hash): array
    {
    }*/

    /**
     * Reverses a given NTLM hash using MD5 decryption (md5decrypt.net).
     *
     * @param string $hash The NTLM hash to be reversed.
     * @return array An array containing the reversed hash.
     * @throws Exception
     */
    public function reverseNTLMHash(string $hash): array
    {
        $md5Decrypt = $this->md5Decrypt($hash, 'ntlm');
        return array($md5Decrypt);
    }
}