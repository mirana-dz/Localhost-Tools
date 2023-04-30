<?php

namespace App\Controllers;

class MessageDigestController
{
    public function index(): void
    {

        $pageTitle = 'Message Digest';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Computes a digest from a string using different algorithms. Supported algorithms are MD2, MD4, MD5, SHA1, ... etc.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/message_digest.php');
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