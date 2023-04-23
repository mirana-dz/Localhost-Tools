<?php

namespace App\Controllers;

use App\Libraries\Torrent\Rutor;
use App\Libraries\Torrent\S1337x;
use App\Libraries\Torrent\ThePirateBayApi;

class TorrentSearchController
{
    public function index()
    {

        $pageTitle = 'Torrent Search';
        $pageCategory = 'OSINT Tools';
        $pageDescription = '<p>Search torrents on popular sites like the Pirate Bay, 1337x, Rutor.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            $engine = $_POST['radio'];
            ob_start();

            switch ($engine) {
                case 'ThePirateBay':
                    echo $this->ThePirateBayResults($input);
                    break;
                case '1337x':
                    echo $this->s1337x($input);
                    break;

                case 'Rutor':
                    echo $this->Rutor($input);
                    break;

            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/torrent_search.php');
    }


    private function ThePirateBayResults($q)
    {
        $thePirateBayApi = new ThePirateBayApi($q);
        $results = $thePirateBayApi->results;
        $html = '';
        foreach ($results as $result) {
            $html .= '<div class="resultContainer">';
            $html .= '<a href="' . $result['magnet'] . '" title="' . $result['name'] . '" target="_blank">' . $result['name'] . '</a>';
            $html .= '<div class="torrentSite">thepiratebay.org</div>';
            $html .= '<div class="torrentInfos">Category: ' . $result['category'] . ' Uploaded: ' . $result['added'] . ' Size: ' . $result['size'] . ' SE: ' . $result['seeders'] . ' LE: ' . $result['leechers'] . '</div>';
            $html .= '</div>';
        }

        return $html;
    }

    private function s1337x($q, $page=1)
    {
        $s1337x = new S1337x($q);
        $results = $s1337x->results;
        $html = '';
        foreach ($results as $result) {
            $html .= '<div class="resultContainer">';
            $html .= '<a href="' . $result['link'] . '" title="' . $result['name'] . '" target="_blank">' . $result['name'] . '</a>';
            $html .= '<div class="torrentSite">1337x.to</div>';
            $html .= '<div class="torrentInfos">Uploaded: TODO Size: TODO SE: ' . $result['seeds'] . ' LE: ' . $result['leeches'] . '</div>';
			$html .= '</div>';
        }
		//TODO
        $html .= '<br>//TODO Pagination : Total page = ' . $s1337x->totalPages . '<br>';

        return $html;

    }

    private function Rutor($q)
    {
        $rutor = new Rutor($q);
        $results = $rutor->results;
        $html = '';
        foreach ($results as $result) {
            $html .= '<div class="resultContainer">';
            $html .= '<a href="' . $result['magnet'] . '" title="' . $result['name'] . '" target="_blank">' . $result['name'] . '</a>';
            $html .= '<div class="torrentSite">rutor.info</div>';
            $html .= '<div class="torrentInfos">Size: ' . $result['size'] . ' SE: ' . $result['seeds'] . ' LE: ' . $result['leeches'] . '</div>';
            $html .= '</div>';
        }

        return $html;
    }

}