<?php

namespace App\Controllers;

class CiscoType7Controller
{

    public function index()
    {

        $pageTitle = 'Cisco Type 7 Password';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Decrypt & encrypt Cisco IOS type 7 passwords.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            if ($_POST['action'] === 'encode') {
                echo $this->encrypt_cisco_type_7($input);
            } elseif ($_POST['action'] === 'decode') {
                echo $this->decrypt_cisco_type_7($input);
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/cisco_type_7.php');
    }

    private function encrypt_cisco_type_7($password)
    {
        $key = 4; // Encryption key for Cisco Type 7

        $password = str_split($password);

        foreach ($password as $char) {
            $output[] = ord($char) ^ $key;
            $key = $output[count($output) - 1];
        }

        $output = implode('', array_map('chr', $output));
        $output = base64_encode($output);

        return '7 ' . $output;
    }

    private function decrypt_cisco_type_7($password)
    {
        $password = substr($password, 2); // Remove the '7 ' prefix
        $password = base64_decode($password);

        $key = 4; // Encryption key for Cisco Type 7

        $password = str_split($password);

        foreach ($password as $char) {
            $output[] = ord($char) ^ $key;
            $key = ord($char);
        }

        $output = implode('', array_map('chr', $output));
        return $output;
    }
}