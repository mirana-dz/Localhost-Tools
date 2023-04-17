<?php

namespace App\Controllers;

class JoomlaPasswordController
{
    public function index()
    {

        $pageTitle = 'Joomla Password Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>You can enter your password to hash.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();

            echo $this->generateJoomlaPassword($input);

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/joomla_password_generator.php');
    }

    private function generateJoomlaPassword($pass): string
    {
        $salt = generateRandomString(32);
        $password = md5($pass . $salt);
        return $password . ':' . $salt;
    }
}