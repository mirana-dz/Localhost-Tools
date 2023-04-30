<?php

namespace App\Controllers;

class PingToolController
{
    public function index(): void
    {

        $pageTitle = 'Ping Tool';
        $pageCategory = 'Network Tools';
        $pageDescription = '<p>Ping Tool is a web-based tool, that allows users to check the availability of a network host. With just a few clicks, users can check if a host is reachable and view its response time.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/ping_tool.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $pingCount = trim(rtrim($_POST['count'], 't') ?? '');

        if (empty($input) || empty($pingCount)) {
            echo 'Invalid input.';
            return;
        }

        $pingResult = '';

        exec("ping " . escapeshellcmd($input) . " -n $pingCount", $results);

        foreach ($results as $result) {
            $pingResult .= sapi_windows_cp_conv(sapi_windows_cp_get('oem'), 65001, $result) . "\n";
        }

        echo trim($pingResult);
    }
}