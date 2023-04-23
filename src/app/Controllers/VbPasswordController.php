<?php

namespace App\Controllers;

class VbPasswordController
{
    public function index()
    {

        $pageTitle = 'Vb Password Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>vBulletin Password Hash Generator.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            $result = $this->generateVbPassword($input);
            $passwordHash = $result['passwordHash'];
            $salt = $result['salt'];

            echo $passwordHash . '<!--SPLIT-->' . $salt;
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/vb_Password_generator.php');
    }

    private function generateVbPassword($pass): array
    {
        $vb['salt'] = $this->fetchUserSalt(30);
        $vb['passwordHash'] = md5(md5($pass) . $vb['salt']);
        return $vb;
    }

    private function fetchUserSalt($length = 3): string
    {
        $salt = '';

        for ($i = 0; $i < $length; $i++) {
            $salt .= chr(rand(33, 126));
        }
        return $salt;
    }
}