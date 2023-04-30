<?php

namespace App\Helpers;

class EncoderDecoderHelper
{

    /**
     * Encodes a domain name using Punycode encoding.
     *
     * @param string $input The domain name to be encoded.
     * @return string The encoded domain name.
     */
    public static function punycode_encode($input)
    {
        return idn_to_ascii($input, 0, INTL_IDNA_VARIANT_UTS46);
    }

    /**
     * Decodes a Punycode-encoded string to UTF-8 using the Intl extension function idn_to_utf8().
     *
     * @param string $input The Punycode-encoded input string to be decoded.
     * @return string|false Returns the decoded string or false on failure.
     */
    public static function punycode_decode($input)
    {
        return idn_to_utf8($input, 0, INTL_IDNA_VARIANT_UTS46);
    }

    /**
     * Encodes a string to hexadecimal notation.
     * @param string $input The string to encode.
     * @return string The encoded string in uppercase hexadecimal notation.
     */
    public static function hex_encode($input)
    {
        $hex = '';
        for ($i = 0; $i < strlen($input); $i++) {
            $hex .= dechex(ord($input[$i]));
        }
        return strtoupper($hex);
    }

    /**
     * Decodes a string from hexadecimal notation.
     *
     * @param string $input The hexadecimal string to decode.
     * @return string The decoded string.
     * */
    public static function hex_decode($input)
    {
        $hex = '';
        for ($i = 0; $i < strlen($input); $i += 2) {
            $hex .= chr(hexdec(substr($input, $i, 2)));
        }
        return $hex;
    }

    /**
     * Encodes a string into binary format.
     *
     * @param string $input The input string to be encoded.
     * @return string The binary encoded string.
     */
    public static function bin_encode(string $input): string
    {
        $bin = '';
        for ($i = 0; $i < strlen($input); $i++) {
            $bin .= str_pad(decbin(ord($input[$i])), 8, '0', STR_PAD_LEFT);
        }
        return $bin;
    }

    /**
     * Decodes a binary string into a string of characters.
     *
     * @param string $input The binary input string to decode.
     * @return string The decoded string of characters.
     */
    public static function bin_decode(string $input): string
    {
        $bin = '';
        for ($i = 0; $i < strlen($input); $i += 8) {
            $bin .= chr(bindec(substr($input, $i, 8)));
        }
        return $bin;
    }
}