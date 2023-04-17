<?php

namespace App\Controllers;

class HtmlObfuscatorController
{
    public function index()
    {

        $pageTitle = 'HTML Obfuscator';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>The HTML obfuscation tool is used by developers to protect their website\'s source code from unauthorized access. It converts HTML code into an obfuscated form that\'s hard to understand, making it more challenging for attackers to steal or replicate the code.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            echo '<script> html=' . rawurlencode($input) . ';d=unescape(html);document.write(d);</script>';
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/html_obfuscator.php');
    }
}