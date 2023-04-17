<?php

namespace App\Controllers;

use App\Vendor\ThePirateBayApi;

class TorrentSearchController
{
    public function index()
    {

        $pageTitle = 'Torrent Search';
        $pageCategory = 'OSINT Tools';
        $pageDescription = '<p>Torrent search ...</p>';

        $input = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();

            $thePirateBayApi = new ThePirateBayApi($input);
            $results = $thePirateBayApi->results;
            //var_dump($results);
            foreach ($results as $result) {
                echo '<div class="resultContainer">';
                echo '<a href="' . $result['magnet'] . '" title="' . $result['name'] . '" target="_blank">' . $result['name'] . '</a>';
                echo '<div class="torrentSite">thepiratebay.org</div>';
                echo '<div class="torrentInfos">Category: ' . $result['category'] . ' Uploaded: ' . $result['added'] . ' Size: ' . $result['size'] . ' SE: ' . $result['seeders'] . ' LE: ' . $result['leechers'] . '</div>';
                echo '</div>';
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/torrent_search.php');
    }
}