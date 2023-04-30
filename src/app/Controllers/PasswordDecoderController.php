<?php

namespace App\Controllers;

use App\Helpers\CiscoDecrypt;


class PasswordDecoderController
{
    public function index(): void
    {

        $pageTitle = 'Password Decoder';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>All-In-One Password Decoder.<br>Here is the list of currently supported password decoding methods: Cisco Type 7, Cisco VPN Client Password, GPP cpassword.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/password_decoder.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $algorithm = trim($_POST['algorithm'] ?? '');

        if (empty($input) || empty($algorithm)) {
            echo 'Invalid input.';
            return;
        }
        switch ($algorithm) {
            case 'cisco_type_7':
                $result = CiscoDecrypt::decrypt_cisco_type_7($input);
                break;
            case 'cisco_vpn':
                $result = CiscoDecrypt::decryptVpnPassword($input);
                break;
            case 'cpassword':
                $result = $this->cpassworddecode($input);
                break;
        }

        echo $result;
    }
	
    // Exemple
    // $data = 'j1Uyj3Vx8TY9LtLZil2uAuZkFQA/4latT76ZwgdHdhw';
    // echo cpassworddecode($data);
    private function cpassworddecode($data)
    {
	    //@see: https://podalirius.net/en/articles/exploiting-windows-group-policy-preferences/
        //@see: https://learn.microsoft.com/en-us/openspecs/windows_protocols/ms-gppref/2c15cbf0-f086-4c74-8b70-1f2fa45dd4be
        $key = hex2bin('4e9906e8fcb66cc9faf49310620ffee8f496e806cc057990209b09a433b66c1b');
        $pw = base64_decode($this->pad($data));

        $cipher = openssl_decrypt($pw, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, str_repeat("\0", 16));
        return $this->unpad($cipher);
    }

    private function pad($data)
    {
        $block_size = 16;
        $padding = $block_size - (strlen($data) % $block_size);
        return $data . str_repeat(chr($padding), $padding);
    }

    private function unpad($data)
    {
        $padding = ord($data[strlen($data) - 1]);
        return substr($data, 0, strlen($data) - $padding);
    }
}