<?php

namespace App\Controllers;

class CaesarCipherController
{
    public function index(): void
    {

        $pageTitle = 'Caesar Cipher';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>This tool uses the Caesar Cipher algorithm to encrypt and decrypt text by shifting letters by a fixed number of positions in the alphabet. It is useful for quick and easy encryption/decryption.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/caesar_cipher.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $shift = trim($_POST['shift'] ?? '');
        $action = trim($_POST['action'] ?? '');

        if (empty($input) || empty($shift) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        if ($action === 'encrypt') {
            echo $this->caesar_cipher($input, $shift);
        } elseif ($action === 'decrypt') {
            echo $this->caesar_cipher($input, 26 - $shift);
        }
    }

    private function caesar_cipher($text, $shift)
    {
        $result = "";
        $length = strlen($text);
        for ($i = 0; $i < $length; $i++) {
            $char = $text[$i];
            // Shift the character by the given amount
            if (ctype_alpha($char)) {
                $ascii = ord(ctype_upper($char) ? 'A' : 'a');
                $char = chr(($ascii + (($shift + ord($char) - $ascii) % 26)));
            }
            $result .= $char;
        }
        return $result;
    }
}