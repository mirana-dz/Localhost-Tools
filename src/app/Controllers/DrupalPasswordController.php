<?php

namespace App\Controllers;

use app\Libraries\drupal\includes\bootstrap;
use app\Libraries\drupal\includes\password;

class DrupalPasswordController
{
	
    public function index()
    {
        $pageTitle = 'Drupal Password Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>You can enter your password to hash.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();

            echo $this->generateDrupalPassword($input);

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/drupal_password_generator.php');
    }                              

    private function generateDrupalPassword($pass): string
    {
	include BASE_PATH . '/../app/includes/drupal/includes/bootstrap.inc';
	include BASE_PATH . '/../app/includes/drupal/includes/password.inc';
	
    return user_hash_password($pass);
    }
}