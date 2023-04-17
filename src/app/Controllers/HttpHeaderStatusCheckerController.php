<?php

namespace App\Controllers;

class HttpHeaderStatusCheckerController
{
    public function index()
    {

        $pageTitle = 'HTTP Header Status Checker';
        $pageCategory = 'Network Tools';
        $pageDescription = '<p>This tools allow you to inspect the HTTP headers that the web server returns when requesting a URL. Works with HTTP and HTTPS URLs.</p>';

        $headersResponse = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            $UrlToCheck = filter_var($input, FILTER_VALIDATE_URL);
            if ($UrlToCheck) {
                file_get_contents($UrlToCheck);
                $headers = $http_response_header;
                $response_code = $headers[0];

                foreach ($headers as $k => $v) {
                    $headersResponse .= $v . "\n";
                }
            }
            if (isset($headers)) {
                echo $response_code . '<!--SPLIT-->' . $headersResponse;
            } else {
                echo '';//TODO
            }
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/http_header_status_checker.php');
    }
}