<?php

namespace App\Controllers;

class SubdomainFinderController
{

    public function index(): void
    {

        $pageTitle = 'Subdomain Finder';
        $pageCategory = 'Network Tools';
        $pageDescription = '<p>Discovered subdomains and their IP addresses.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/subdomain_finder.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');

        if (empty($input)) {
            echo 'Invalid input.';
            return;
        }

        $results = $this->subDomainFinder($input);
        echo '<p>Search result for <b>' . $input . '</b>.</p>';
        echo '<table class="tb"><tbody>
             <tr>
               <th>Domain</th>
               <th>IP</th>
             </tr>';
        foreach ($results as $domain => $ip) {
            echo '<tr><td>' . $domain . '</td><td>' . $ip . '</td></tr>';
        }
        echo '</tbody></table>';
    }

    private function subDomainFinder($site)
    {
        $url = 'https://www.pagesinventory.com/search/?s=' . $site;
        $getHtml = httpsGetRequest($url);

        $ipAddress = gethostbyname($site);

        //$result = stripos($getHtml, 'Search result for');
        $resultNotFound = stripos($getHtml, 'Nothing was found');

        if (filter_var($ipAddress, FILTER_VALIDATE_IP)) {
            if ($resultNotFound !== false) {
                die('Nothing was found.');
            }
        } else {
            die('Checking The Connection ...');
        }

        preg_match_all('<a href="/domain/(.*?).html">', $getHtml, $domainMatch);
        preg_match_all('<a href="/ip/(.*?).html">', $getHtml, $ipMatch);
        return array_combine($domainMatch[1], $ipMatch[1]);
    }
}