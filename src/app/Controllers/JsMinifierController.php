<?php

namespace App\Controllers;

class JsMinifierController
{
    public function index(): void
    {

        $pageTitle = 'JS Minifier';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>Javascript Minifier is easy to use tool to minify JS data. Copy, Paste, and Minify.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/js_minifier.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');

        if (empty($input)) {
            echo 'Invalid input.';
            return;
        }

        echo $this->minify_js($input);

    }

    /**
     * Minifies JavaScript code by removing comments and unnecessary white space.
     *
     * @param string $code The JavaScript code to be minified.
     * @return string The minified JavaScript code.
     */
    private function minify_js($code)
    {
        // Remove comments
        $code = preg_replace('/(?<!http:|https:)\/\/.*$/m', '', $code); // Remove comments starting with //, but skips URLs that might include // in the middle of the address.
        // Remove comments wrapped in /* */
        $code = preg_replace('!/\*.*?\*/!s', '', $code);
        $code = preg_replace('/\n\s*\n/', "\n", $code);
        $code = preg_replace('/^\s*\n/m', '', $code);

        // Remove white space
        $code = preg_replace('/\s+/', ' ', $code);
        // Remove whitespace around punctuation
        $code = preg_replace('/\s*([,:;{}()]+)\s*/', '$1', $code);

        return $code;
    }
}