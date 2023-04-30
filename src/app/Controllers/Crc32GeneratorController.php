<?php

namespace App\Controllers;

class Crc32GeneratorController
{
    public function index(): void
    {

        $pageTitle = 'CRC32 Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Compute CRC-32 from text. Type or copy/paste some text in the box to instantly calculate the corresponding CRC-32.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/crc32_generator.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $algorithm = trim($_POST['algorithm'] ?? '');

        if (empty($input) || empty($algorithm)) {
            echo 'Invalid input.';
            return;
        }

        echo hash($algorithm, $input);
    }
}