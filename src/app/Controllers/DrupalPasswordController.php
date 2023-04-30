<?php

namespace App\Controllers;

use app\Libraries\drupal\includes\bootstrap;
use app\Libraries\drupal\includes\password;

class DrupalPasswordController
{

    public function index(): void
    {
        $pageTitle = 'Drupal Password Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>You can enter your password to hash.</p>';


        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/drupal_password_generator.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');


        if (empty($input)) {
            echo 'Invalid input.';
            return;
        }

        echo $this->generateDrupalPassword($input);
    }

    private function generateDrupalPassword($pass): string
    {
        include BASE_PATH . '/../app/includes/drupal/includes/bootstrap.inc';
        include BASE_PATH . '/../app/includes/drupal/includes/password.inc';

        return user_hash_password($pass);
    }
}