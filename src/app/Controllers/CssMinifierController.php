<?php

namespace App\Controllers;

class CssMinifierController
{
    public function index()
    {

        $pageTitle = 'CSS Minifier';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>Minifies CSS code by removing all the unnecessary whitespace characters from the code to make it compact. Useful for optimizing your CSS code for production. Minifying CSS code immensely helps reduce file size and bandwidth usage to make your website load faster.</p>';

        $input = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            echo $this->minify_css($input);
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/css_minifier.php');
    }

    private function minify_css($css)
    {
        // Remove comments
        $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);

        // Remove tabs, newlines, and extra spaces
        $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);

        return $css;
    }
}