<?php

namespace App\Controllers;

class JoomlaPasswordController
{
    public function index(): void
    {

        $pageTitle = 'Joomla Password Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>You can enter your password to hash.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/joomla_password_generator.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');

        if (empty($input)) {
            echo 'Invalid input.';
            return;
        }

        echo $this->generateJoomlaPassword($input);

    }

    /**
     * Generate a Joomla password hash with salt
     *
     * @param string $pass The password to hash
     * @return string The hashed password with salt, in the format "password:salt"
     */
    private function generateJoomlaPassword($pass): string
    {
        $salt = generateRandomString(32);
        $password = md5($pass . $salt);
        return $password . ':' . $salt;
    }
}