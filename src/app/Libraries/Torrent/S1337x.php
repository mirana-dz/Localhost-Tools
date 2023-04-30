<?php

namespace App\Libraries\Torrent;

use DOMDocument;
use DOMXPath;

class S1337x
{
    private const BASE_URL = "https://1337x.to";
    public array $results;
    public $totalPages;
    protected ?array $torrentInfo = null;


    function __construct($q, $page = 1)
    {
        $this->torrentInfo = array();
        $this->results = $this->get_1337x($q, $page);
    }

    private function get_1337x($q, $page = 1): ?array
    {

        $baseUrl = self::BASE_URL . "/search/" . $q . "/" . $page . "/";

        $getHtml = httpsGetRequest($baseUrl);

        $xpath = $this->get_xpath($getHtml);

        try {
            $pageCounts = $xpath->query('//div[@class="pagination"]/ul/li');

            $lastLink = $xpath->evaluate('string(//li[@class="last"]/a/@href)');
            //<li class="last"><a href="/search/{search}/50/">Last</a></li>
            preg_match('/\/(\d+)\/$/', $lastLink, $matches);
            $this->totalPages = $matches[1];

            //TODO
            //https://1337x.to/search/delphi/36/ laste one is numeric
            //if (is_numeric($pageCounts[count($pageCounts-1)]->nodeValue)) {
            //$totalPages = $pageCounts[count($pageCounts-1)]->nodeValue;
        } catch (Exception $e) {
            $this->totalPages = 1;
        }

        foreach ($xpath->query("//table/tbody/tr") as $result) {

            $a = $result->getElementsByTagName("a")[1];

            $date = strtotime($result->getElementsByTagName("td")[4]->nodeValue);

            $this->torrentInfo[] = array(
                "name" => $a->nodeValue,
                "seeds" => intval($result->getElementsByTagName("td")[1]->nodeValue),
                "leeches" => intval($result->getElementsByTagName("td")[2]->nodeValue),
                "size" => explode("B", $result->getElementsByTagName("td")[3]->nodeValue)[0] . "B",
                "added" => $date,
                "uploader" => $result->getElementsByTagName("a")[2]->nodeValue,
                "link" => "http://1337xx.to" . $a->getAttribute("href"),
                "provider" => "1337x"
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