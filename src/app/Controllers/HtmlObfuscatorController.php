<?php

namespace App\Controllers;

class HtmlObfuscatorController
{
    public function index(): void
    {

        $pageTitle = 'HTML Obfuscator';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>The HTML obfuscation tool is used by developers to protect their website\'s source code from unauthorized access. It converts HTML code into an obfuscated form that\'s hard to understand, making it more challenging for attackers to steal or replicate the code.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/html_obfuscator.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');


        if (empty($input)) {
            echo 'Invalid input.';
            return;
        }

        echo '<script> html=' . rawurlencode($input) . ';d=unescape(html);document.write(d);</script>';

    }
}