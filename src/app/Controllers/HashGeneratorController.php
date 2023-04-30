<?php

namespace App\Controllers;

class HashGeneratorController
{
    public function index(): void
    {

        $pageTitle = 'Hash Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Calculates the hash of string using various algorithms.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/hash_generator.php');
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