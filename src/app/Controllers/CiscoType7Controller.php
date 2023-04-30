<?php

namespace App\Controllers;

use App\Helpers\CiscoDecrypt;

class CiscoType7Controller
{

    public function index(): void
    {

        $pageTitle = 'Cisco Type 7 Password';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Decrypt & encrypt Cisco IOS type 7 passwords.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/cisco_type_7.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $action = trim($_POST['action'] ?? '');

        if (empty($input) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        if ($action === 'encode') {
            $result = CiscoDecrypt::encrypt_cisco_type_7($input);
        } elseif ($action === 'decode') {
            $result = CiscoDecrypt::decrypt_cisco_type_7($input);
        }

        echo $result;
    }
}