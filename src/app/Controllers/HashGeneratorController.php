<?php

namespace App\Controllers;

class HashGeneratorController
{
    public function index()
    {

        $pageTitle = 'Hash Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Calculates the hash of string using various algorithms.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            echo hash($_POST['algorithm'], $input);
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/hash_generator.php');
    }
}