<?php

namespace App\Controllers;

class HtpasswdGeneratorController
{
    public function index(): void
    {

        $pageTitle = 'Htpasswd Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Htpasswd Generator ... It provides a simple interface for developers to encode and decode sensitive information into a format that is safe for transmission over the internet.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/htPasswd_generator.php');
            return;
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($username) || empty($password)) {
            echo 'Invalid input.';
            return;
        }

        //$encrypted_password = crypt($password, '$apr1$' . uniqid(mt_rand(), true));
        $encrypted_password = password_hash($password, PASSWORD_BCRYPT);
        echo $username . ':' . $encrypted_password;
    }
}