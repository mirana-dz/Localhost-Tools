<?php

namespace App\Controllers;

use App\Libraries\Torrent\Rutor;
use App\Libraries\Torrent\S1337x;
use App\Libraries\Torrent\ThePirateBayApi;

class TorrentSearchController
{
    public function index(): void
    {

        $pageTitle = 'Torrent Search';
        $pageCategory = 'OSINT Tools';
        $pageDescription = '<p>Search torrents on popular sites like the Pirate Bay, 1337x, Rutor.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/torrent_search.php');
            return;
        }

        $q = trim($_POST['q'] ?? '');
        $engine = trim($_POST['engine'] ?? '');
        $page = trim($_POST['page'] ?? 1);


        if (empty($q) || empty($engine)) {
            echo 'Invalid input.';
            return;
        }

        switch ($engine) {
            case 'ThePirateBay':
                $result = $this->ThePirateBayResults($q);
                if (empty($result)) {
                    echo 'No results found';
                } else {
                    echo $result;
                }
                break;
            case '1337x':
                echo $this->s1337x($q, $page);
                break;

            case 'Rutor':
                echo $this->Rutor($q);
                break;
        }
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

    private function s1337x($q, $page = 1)
    {
        $s1337x = new S1337x($q, $page);
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
        $html .= $this->generatePagination($s1337x->totalPages, $page, '?route=torrent_search&engine=1337x&q=' . $q);
        // $html .= '<br>//TODO Pagination : Total page = ' . $s1337x->totalPages . '<br>';

        return $html;

    }

    private function generatePagination($totalPages, $currentPage, $url)
    {
        $output = '<div class="pagination1-wrapper"><ul class="pagination1">';
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
                $output .= '<li class="active"><a href="' . $url . '&page=' . $i . '" class="myLink">' . $i . '</a></li>';
            } else {
                $output .= '<li><a href="' . $url . '&page=' . $i . '" class="myLink">' . $i . '</a></li>';
            }
        }
        $output .= '</ul></div>';

        $output .= "<script>	 
$(document).ready(function() {
  $('.myLink').click(function(event) {
    event.preventDefault(); // Prevent the default link behavior

    var url = $(this).attr('href'); // Get the URL from the link
    var data = {}; // Define an empty object to store the extracted data
    
    // Extract the 'engine', 'q', and 'page' parameters from the URL
    var params = url.split('?')[1].split('&');
    for (var i = 0; i < params.length; i++) {
      var param = params[i].split('=');
      var key = decodeURIComponent(param[0]);
      var value = decodeURIComponent(param[1]);
      data[key] = value;
    }
    
    // Debugging code - log the extracted data to the console
    console.log(data);
    
    // Send the AJAX request with the extracted data
    $.ajax({
     // url: url,
      type: 'POST',
      data: data,
      success: function(response) {
        // Handle the server response here
		$('#result-display').html(response);
      },
      error: function(xhr, status, error) {
        // Handle any errors here
        console.log('Error:', error);
      }
    });
  });
});

</script>";


        return $output;
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