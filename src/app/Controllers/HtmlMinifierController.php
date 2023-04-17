<?php

namespace App\Controllers;

class HtmlMinifierController
{
    public function index()
    {

        $pageTitle = 'HTML Minifier';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>Reduces the size of HTML files by removing unnecessary whitespace and comments. This can help improve the performance of websites by reducing the amount of data that needs to be transferred over the internet.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();

            // Remove unnecessary whitespace and comments
            $html = preg_replace('/<!--(.|\s)*?-->/', '', $input);
            $html = preg_replace('/\s{2,}/', ' ', $html);
            $html = preg_replace('/\s*>/', '>', $html);
            $html = preg_replace('/>\s+/', '>', $html);
            $html = preg_replace('/\s+</', '<', $html);
            $html = preg_replace('/<\s+/', '<', $html);
            echo $html;
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/html_minifier.php');
    }
}