<?php

namespace App\Controllers;

class HmacGeneratorController
{
    public function index(): void
    {

        $pageTitle = 'HMAC Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Computes a Hash-based message authentication code (HMAC) using a secret key. A HMAC is a small set of data that helps authenticate the nature of message; it protects the integrity and the authenticity of the message.
The secret key is a unique piece of information that is used to compute the HMAC and is known both by the sender and the receiver of the message. This key will vary in length depending on the algorithm that you use.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/hmac_generator.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $algorithm = trim($_POST['algorithm'] ?? '');
        $input_key = trim($_POST['input_key'] ?? '');

        if (empty($input) || empty($algorithm) || empty($input_key)) {
            echo 'Invalid input.';
            return;
        }

        echo hash_hmac($algorithm, $input, $input_key);
    }
}