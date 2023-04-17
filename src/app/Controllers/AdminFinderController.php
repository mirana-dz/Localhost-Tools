<?php

namespace App\Controllers;

class AdminFinderController
{
    public function index()
    {

        $pageTitle = 'Admin Finder';
        $pageCategory = 'Pentesting Tools';
        $pageDescription = '<p>Website admin panel finder is designed to find the admin panel of any website by using a wordlist.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $url = trim($_POST['url']);
            $admin = trim($_POST['word']);
            ob_start();

            // $link = urldecode($url . $admin);
            $link = $url . $admin;

            // $headers = get_headers($link, 1);
            $httpCode = getHTTPCode($link);

            // if ($headers[0] == 'HTTP/1.1 200 OK') {
            if ($httpCode == 200) {
                //TODO
                $outputFilePath = dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'output' . DIRECTORY_SEPARATOR . 'adminFinder.txt';
                $outputFile = fopen($outputFilePath, 'a') or die('Unable to open file!');
                $txt = $link . "\n";
                fputs($outputFile, $txt);
                fclose($outputFile);

                echo '<tr><td>[+]</td><td><a href="' . $url . $admin . '" target="_blank">' . $url . $admin . '</a></td><td>[ <span style="color:green;font-weight:bold">Found</span> ]</td></tr>';
            } else {
                echo '<tr><td>[-]</td><td>' . $url . $admin . '</td><td>[ <span style="color:red">Not Found</span> ]</td></tr>';
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/admin_finder.php');
    }
}