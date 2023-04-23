<?php

namespace App\Libraries\Torrent;

use DOMDocument;
use DOMXPath;

class Rutor
{
    private const BASE_URL = "http://rutor.info";
    public array $results;
    protected ?array $torrentInfo = null;

    function __construct($q)
    {
        $this->torrentInfo = array();
        $this->results = $this->get_rutor($q);
    }

    private function get_rutor($q): ?array
    {

        $baseUrl = self::BASE_URL . "/search/" . $q;

        $getHtml = httpsGetRequest($baseUrl);

        $xpath = $this->get_xpath($getHtml);

        foreach ($xpath->query("//table/tr[@class='gai' or @class='tum']") as $result) {

            $this->torrentInfo[] = array(
                "name" => $xpath->evaluate(".//td/a", $result)[2]->textContent,
                "magnet" => $xpath->evaluate(".//td/a/@href", $result)[1]->textContent,
                "size" => $xpath->evaluate(".//td", $result)[3]->textContent,
                "seeds" => $xpath->evaluate(".//span", $result)[0]->textContent,
                "leeches" => $xpath->evaluate(".//span", $result)[1]->textContent
            );
        }
        return $this->torrentInfo;
    }

    private function get_xpath($html_document): DOMXPath
    {
        $htmlDom = new DOMDocument;
        @$htmlDom->loadHTML($html_document);
        return new DOMXPath($htmlDom);
    }

}