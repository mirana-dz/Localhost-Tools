<?php

namespace App\Controllers;

use Tuupola\Base32;

class EncoderDecoderController
{
    public function Base64()
    {

        $pageTitle = 'Base64 Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>The Base64 Encoder/Decoder is a tool that converts strings to Base64 and vice versa. It provides a simple interface for developers to encode and decode sensitive information into a format that is safe for transmission over the internet.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            $algorithm = trim($_POST['algorithm']);
            ob_start();
            switch ($algorithm) {
                case 'base64':
                    if ($_POST['action'] === 'encode') {
                        echo base64_encode($input);
                    } elseif ($_POST['action'] === 'decode') {
                        echo base64_decode($input);
                    }
                    break;
                case 'base32':		
                    $base32 = new Base32;
                    if ($_POST['action'] === 'encode') {
                        echo $base32->encode($input);
                    } elseif ($_POST['action'] === 'decode') {
					
					if (is_base32($input)) {
                        echo $base32->decode($input);
									} else {
				       echo 'This one is NOT base32';
				       }	

                    }
                    break;
            }
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/encoder_decoder.php');
    }
	
    public function url()
    {

        $pageTitle = 'URL Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>URL Encoder/Decoder is a developer tool to encode a URL string to comply with the URL standard or decode a URL string to a human-friendly and more readable one.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            if ($_POST['action'] === 'encode') {
                echo urlencode($input);
            } elseif ($_POST['action'] === 'decode') {
                echo urldecode($input);
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/encoder_decoder.php');
    }

    public function uu()
    {

        $pageTitle = 'UU Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>UuEncoder is a tool that converts to and from uuEncoding. The uuEncoding is a binary to ASCII encoding that comes from Unix where it was used for transmitting of binary files on the top of text-based protocols.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            if ($_POST['action'] === 'encode') {
                echo convert_uuencode($input);
            } elseif ($_POST['action'] === 'decode') {
                echo convert_uudecode($input);
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/encoder_decoder.php');
    }

    public function rot13()
    {

        $pageTitle = 'Rot13 Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>ROT13 (rotate by 13 places) replaces a letter with the letter 13 letters after it in the alphabet. It has been described as the "Usenet equivalent printing an answer to a quiz upside down" as it provides virtually no cryptographic security.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            if ($_POST['action'] === 'encode') {
                echo str_rot13($input);
            } elseif ($_POST['action'] === 'decode') {
                echo str_rot13($input);
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/encoder_decoder.php');
    }

    public function punycode()
    {

        $pageTitle = 'Punycode Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>A tool that converts a text with special characters (Unicode) to the Punycode encoding (just ASCII). Used for internationalized domain names (IDN).</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            if ($_POST['action'] === 'encode') {
                echo $this->punycode_encode($input);
            } elseif ($_POST['action'] === 'decode') {
                echo $this->punycode_decode($input);
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/encoder_decoder.php');
    }

    // Function to encode a string in Punycode
    private function punycode_encode($input)
    {
        return idn_to_ascii($input, 0, INTL_IDNA_VARIANT_UTS46);
    }

    // Function to decode a string from Punycode
    private function punycode_decode($input)
    {
        return idn_to_utf8($input, 0, INTL_IDNA_VARIANT_UTS46);
    }

    public function hex()
    {

        $pageTitle = 'Hex Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>Hex Encoder/Decoder is a tool that converts text to and from hexadecimal notation. It encodes text into a hexadecimal string and can also decode a hexadecimal string back into its original format. This tool is useful for data transmission, cryptography, and computer programming. Hex Encoder/Decoder enables efficient work with text in hexadecimal format and easy conversion back to the original format.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();


            if ($_POST['action'] === 'encode') {
                echo $this->hex_encode($input);
            } elseif ($_POST['action'] === 'decode') {
                echo $this->hex_decode($input);
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/encoder_decoder.php');
    }

    // Function to encode a string in hexadecimal notation
    private function hex_encode($input)
    {
        $hex = '';
        for ($i = 0; $i < strlen($input); $i++) {
            $hex .= dechex(ord($input[$i]));
        }
        return strtoupper($hex);
    }

    // Function to decode a string from hexadecimal notation
    private function hex_decode($input)
    {
        $hex = '';
        for ($i = 0; $i < strlen($input); $i += 2) {
            $hex .= chr(hexdec(substr($input, $i, 2)));
        }
        return $hex;
    }

    public function bin()
    {

        $pageTitle = 'Bin Encoder/Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>Binary Encoder/Decoder is a tool that converts text to/from binary notation. It encodes text into a series of 1s and 0s for secure and efficient data transmission, while the decoder deciphers binary code back into its original text form. It\'s a useful tool for anyone who needs to work with binary notation.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            if ($_POST['action'] === 'encode') {
                echo $this->bin_encode($input);
            } elseif ($_POST['action'] === 'decode') {
                echo $this->bin_decode($input);
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/encoder_decoder.php');
    }

    // Function to encode a string in binary notation
    private function bin_encode($input)
    {
        $bin = '';
        for ($i = 0; $i < strlen($input); $i++) {
            $bin .= str_pad(decbin(ord($input[$i])), 8, '0', STR_PAD_LEFT);
        }
        return $bin;
    }

    // Function to decode a string from binary notation
    private function bin_decode($input)
    {
        $bin = '';
        for ($i = 0; $i < strlen($input); $i += 8) {
            $bin .= chr(bindec(substr($input, $i, 8)));
        }
        return $bin;
    }
}