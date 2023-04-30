<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

class AdminFinderController
{
    public function index(): void
    {

        $pageTitle = 'Admin Finder';
        $pageCategory = 'Pentesting Tools';
        $pageDescription = '<p>Website admin panel finder is designed to find the admin panel of any website by using a wordlist.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/admin_finder.php');
            return;
        }

        $url = trim($_POST['url'] ?? '');
        $admin = trim($_POST['word'] ?? '');

        if (empty($url) || empty($admin)) {
            echo 'Invalid input.';
            return;
        }

        $link = $url . $admin;
        $result = '';


        $client = new Client();

        try {
            $res = $client->request('GET', $link);
            $httpCode = $res->getStatusCode();
            if ($httpCode == 200) {
                $result .= '<tr><td>[+]</td><td><a href="' . $url . $admin . '" target="_blank">' . $url . $admin . '</a></td><td>[ <span style="color:green;font-weight:bold">Found</span> ]</td></tr>';
            }
            // Process the response as needed
        } catch (ClientException $e) {
            if ($e->getResponse()->getStatusCode() == 404) {
                // Handle the 404 error
                $result .= '<tr><td>[-]</td><td>' . $url . $admin . '</td><td>[ <span style="color:red">Not Found</span> ]</td></tr>';
            } else {
                // Handle other types of errors
                echo "An error occurred: " . $e->getMessage();
            }
        } catch (GuzzleException $e) {
            echo "An error occurred: " . $e->getMessage();
        }

        echo $result;
    }
}