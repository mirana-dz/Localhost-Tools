<?php

namespace App\Controllers;

class HmacGeneratorController
{
    public function index()
    {

        $pageTitle = 'HMAC Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Computes a Hash-based message authentication code (HMAC) using a secret key. A HMAC is a small set of data that helps authenticate the nature of message; it protects the integrity and the authenticity of the message.
The secret key is a unique piece of information that is used to compute the HMAC and is known both by the sender and the receiver of the message. This key will vary in length depending on the algorithm that you use.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            echo hash_hmac($_POST['algorithm'], $input, $_POST['input_key']);
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/hmac_generator.php');
    }
}