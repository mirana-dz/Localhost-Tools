<?php

namespace App\Controllers;

class WhoisLookupController
{
    public function index(): void
    {

        $pageTitle = 'Whois Lookup';
        $pageCategory = 'Network Tools';
        $pageDescription = '<p>Enter a domain name without a subdomain. For example, google.com.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/whois_lookup.php');
            return;
        }

        $domainName = trim($_POST['input'] ?? '');


        if (empty($domainName)) {
            echo 'Invalid input.';
            return;
        }

        $server = "whois.crsnic.net";
        $port = 43;

        if (($whoisInfo = fsockopen($server, $port)) == true) {
            $output = '';
            fputs($whoisInfo, "$domainName\r\n");
            while (!feof($whoisInfo))
                $output .= fgets($whoisInfo, 128);
            fclose($whoisInfo);
        }


        if (isset($output)) {
            $result = explode('<<<', $output);
            $rawData = explode("\n", $result[0]);

            echo '<table class="tb"><tbody>
                 <tr>
                    <th scope="col">Field</th>
                    <th scope="col">Value</th>
                 </tr>';

            foreach ($rawData as $item) {
                @list($field, $value) = explode(":", $item);
                echo '<tr><td>' . $field . '</td><td>' . $value . '</td></tr>';
            }

            echo '</tbody></table>';
        }
    }
}