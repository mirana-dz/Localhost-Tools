<?php

namespace App\Controllers;

class MessageDigestController
{
    public function index()
    {

        $pageTitle = 'Message Digest & SHA (MD5, MD4, MD2, ...)';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Computes a digest from a string using different algorithms. Supported algorithms are MD2, MD4, MD5, SHA1, ... etc.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            echo hash($_POST['algorithm'], $input);
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/message_digest.php');
    }
}