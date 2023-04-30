<?php

namespace App\Controllers;

class HtmlMinifierController
{
    public function index(): void
    {

        $pageTitle = 'HTML Minifier';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>Reduces the size of HTML files by removing unnecessary whitespace and comments. This can help improve the performance of websites by reducing the amount of data that needs to be transferred over the internet.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/html_minifier.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');

        if (empty($input)) {
            echo 'Invalid input.';
            return;
        }

        echo $this->htmlMinifier($input);
    }

    /**
     * Minify HTML code by removing unnecessary whitespace and comments.
     *
     * @param string $html The HTML code to minify.
     * @return string The minified HTML code.
     */
    private function htmlMinifier($html)
    {
        // Remove unnecessary whitespace and comments
        $html = preg_replace('/<!--(.|\s)*?-->/', '', $html);
        $html = preg_replace('/\s{2,}/', ' ', $html);
        $html = preg_replace('/\s*>/', '>', $html);
        $html = preg_replace('/>\s+/', '>', $html);
        $html = preg_replace('/\s+</', '<', $html);
        $html = preg_replace('/<\s+/', '<', $html);
        return $html;
    }
}