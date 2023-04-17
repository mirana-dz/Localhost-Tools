<?php

namespace App\Controllers;

class PingToolController
{
    public function index()
    {

        $pageTitle = 'Ping Tool';
        $pageCategory = 'Network Tools';
        $pageDescription = '<p>Ping Tool is a web-based tool, that allows users to check the availability of a network host. With just a few clicks, users can check if a host is reachable and view its response time.</p>';

        $input = '';
        $pingResult = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            $pingCount = rtrim($_POST['count'], 't');

            ob_start();

            exec("ping " . escapeshellcmd($input) . " -n $pingCount", $results);

            foreach ($results as $result) {
                $pingResult .= sapi_windows_cp_conv(sapi_windows_cp_get('oem'), 65001, $result) . "\n";
            }

            echo $pingResult;

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/ping_tool.php');
    }
}