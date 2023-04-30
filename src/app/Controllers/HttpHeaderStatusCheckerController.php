<?php

namespace App\Controllers;

use GuzzleHttp\Client;

class HttpHeaderStatusCheckerController
{
    public function index(): void
    {

        $pageTitle = 'HTTP Header Status Checker';
        $pageCategory = 'Network Tools';
        $pageDescription = '<p>This tools allow you to inspect the HTTP headers that the web server returns when requesting a URL. Works with HTTP and HTTPS URLs.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/http_header_status_checker.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');

        if (empty($input)) {
            echo 'Invalid input.';
            return;
        }
        /*
        $UrlToCheck = filter_var($input, FILTER_VALIDATE_URL);
        if ($UrlToCheck) {
            echo 'Invalid URL.';
            return;
        }*/
        $headersResponse = '';
        $client = new Client();
        $res = $client->request('GET', $input);

        foreach ($res->getHeaders() as $name => $values) {
            $headersResponse .= $name . ': ' . implode(', ', $values) . "\r\n";
        }

        echo $res->getStatusCode() . '<!--SPLIT-->' . $headersResponse;

    }
}