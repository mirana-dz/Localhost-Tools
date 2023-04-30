<?php

namespace App\Controllers;

use App\Helpers\EncoderDecoderHelper;
use Tuupola\Base32;
use Tuupola\Base58;

class EncoderDecoderController
{
    public function Base64(): void
    {

        $pageTitle = 'Base64 Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>The Base64 Encoder/Decoder is a tool that converts strings to Base64 and vice versa. It provides a simple interface for developers to encode and decode sensitive information into a format that is safe for transmission over the internet.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/encoder_decoder.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $algorithm = trim($_POST['algorithm'] ?? '');
        $action = trim($_POST['action'] ?? '');

        if (empty($input) || empty($algorithm) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        switch ($algorithm) {
            case 'base32':
                $base32 = new Base32;
                if ($action === 'encode') {
                    $result = $base32->encode($input);
                } elseif ($action === 'decode') {
                    if (is_base32($input)) {
                        $result = $base32->decode($input);
                    } else {
                        $result = 'This one is NOT base32';
                    }
                }
                break;
            case 'base58':
                $base58 = new Base58;
                if ($action === 'encode') {
                    $result = $base58->encode($input);
                } elseif ($action === 'decode') {
                    $result = $base58->decode($input);
                }
                break;
            case 'base64':
                if ($action === 'encode') {
                    $result = base64_encode($input);
                } elseif ($action === 'decode') {
                    $result = base64_decode($input);
                }
                break;
        }

        echo $result;
    }

    public function url(): void
    {

        $pageTitle = 'URL Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>URL Encoder/Decoder is a developer tool to encode a URL string to comply with the URL standard or decode a URL string to a human-friendly and more readable one.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/encoder_decoder.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $action = trim($_POST['action'] ?? '');

        if (empty($input) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        if ($action === 'encode') {
            $result = urlencode($input);
        } elseif ($action === 'decode') {
            $result = urldecode($input);
        }

        echo $result;
    }

    public function uu(): void
    {

        $pageTitle = 'UU Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>UU Encoder is a tool that converts to and from uuEncoding. The uuEncoding is a binary to ASCII encoding that comes from Unix where it was used for transmitting of binary files on the top of text-based protocols.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/encoder_decoder.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $action = trim($_POST['action'] ?? '');

        if (empty($input) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        if ($action === 'encode') {
            $result = convert_uuencode($input);
        } elseif ($action === 'decode') {
            $result = convert_uudecode($input);
        }

        echo $result;
    }

    public function rot13(): void
    {

        $pageTitle = 'Rot13 Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>ROT13 (rotate by 13 places) replaces a letter with the letter 13 letters after it in the alphabet. It has been described as the "Usenet equivalent printing an answer to a quiz upside down" as it provides virtually no cryptographic security.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/encoder_decoder.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $action = trim($_POST['action'] ?? '');

        if (empty($input) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        if ($action === 'encode') {
            $result = str_rot13($input);
        } elseif ($action === 'decode') {
            $result = str_rot13($input);
        }

        echo $result;
    }

    public function punycode(): void
    {

        $pageTitle = 'Punycode Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>A tool that converts a text with special characters (Unicode) to the Punycode encoding (just ASCII). Used for internationalized domain names (IDN).</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/encoder_decoder.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $action = trim($_POST['action'] ?? '');

        if (empty($input) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        if ($action === 'encode') {
            $result = EncoderDecoderHelper::punycode_encode($input);
        } elseif ($action === 'decode') {
            $result = EncoderDecoderHelper::punycode_decode($input);
        }

        echo $result;
    }

    public function hex(): void
    {

        $pageTitle = 'Hex Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>Hex Encoder/Decoder is a tool that converts text to and from hexadecimal notation. It encodes text into a hexadecimal string and can also decode a hexadecimal string back into its original format. This tool is useful for data transmission, cryptography, and computer programming. Hex Encoder/Decoder enables efficient work with text in hexadecimal format and easy conversion back to the original format.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/encoder_decoder.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $action = trim($_POST['action'] ?? '');

        if (empty($input) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        if ($action === 'encode') {
            $result = EncoderDecoderHelper::hex_encode($input);
        } elseif ($action === 'decode') {
            $result = EncoderDecoderHelper::hex_decode($input);
        }

        echo $result;
    }

    public function bin(): void
    {

        $pageTitle = 'Bin Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>Binary Encoder/Decoder is a tool that converts text to/from binary notation. It encodes text into a series of 1s and 0s for secure and efficient data transmission, while the decoder deciphers binary code back into its original text form. It\'s a useful tool for anyone who needs to work with binary notation.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/encoder_decoder.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $action = trim($_POST['action'] ?? '');

        if (empty($input) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        if ($action === 'encode') {
            $result = EncoderDecoderHelper::bin_encode($input);
        } elseif ($action === 'decode') {
            $result = EncoderDecoderHelper::bin_decode($input);
        }

        echo $result;
    }
}