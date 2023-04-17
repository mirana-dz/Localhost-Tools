<?php

namespace App\Controllers;

class Crc32GeneratorController
{
    public function index()
    {

        $pageTitle = 'CRC32 Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Compute CRC-32 from text. Type or copy/paste some text in the box to instantly calculate the corresponding CRC-32.</p>';

        $input = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            echo hash($_POST['algorithm'], $input);
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/crc32_generator.php');
    }
}