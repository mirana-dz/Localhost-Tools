<?php

namespace App\Vendor;

class ThePirateBayApi
{
    private const API_URL = 'https://apibay.org/q.php?q=';
    private const API_FILE_URL = 'https://apibay.org/f.php?id=';
    private const CATEGORIES = array(
        '1' => 'Audio',
        '2' => 'Video',
        '3' => 'Applications',
        '6' => 'Other',
        '102' => 'Audio Books',
        '199' => 'Other',
        '201' => 'Movies',
        '202' => 'Movies DVDR',
        '204' => 'Movie Clips',
        '205' => 'TV-Shows',
        '206' => 'Handheld',
        '207' => 'HD Movies',
        '208' => 'HD TV-Shows',
        '209' => '3D',
        '299' => 'Other',
        '301' => 'Windows',
        '302' => 'Mac/Apple',
        '303' => 'UNIX',
        '304' => 'Handheld',
        '305' => 'IOS(iPad/iPhone)',
        '306' => 'Android',
        '399' => 'Other OS',
        '601' => 'E-books',
        '603' => 'Pictures',
        '605' => 'Physibles',
        '699' => 'Other',
    );
    private const TRACKERS = array(
        'udp://tracker.coppersurfer.tk:6969/announce',
        'udp://tracker.openbittorrent.com:6969/announce',
        'udp://9.rarbg.to:2710/announce',
        'udp://9.rarbg.me:2780/announce',
        'udp://9.rarbg.to:2730/announce',
        'udp://tracker.opentrackr.org:1337',
        'http://p4p.arenabg.com:1337/announce',
        'udp://tracker.torrent.eu.org:451/announce',
        'udp://tracker.tiny-vps.com:6969/announce',
        'udp://open.stealth.si:80/announce'
    );
    public array $results;
    protected ?array $torrentInfo = null;

    function __construct($q)
    {
        $this->torrentInfo = array();
        $this->results = $this->getApiBay($q);
    }

    private function getApiBay($q): ?array
    {
        $apiUrl = self::API_URL . $q;
        $getHtml = httpsGetRequest($apiUrl);
        $results = json_decode($getHtml, true);

        foreach ($results as $result) {
            if (!isset(self::CATEGORIES[$result['category']]))
                break;

            $this->torrentInfo[] = array(
                'id' => $result['id'],
                'name' => $result['name'],
                'info_hash' => $result['info_hash'],
                'leechers' => $result['leechers'],
                'seeders' => $result['seeders'],
                'num_files' => $result['num_files'],
                'size' => readableFileSize($result['size']),
                'username' => $result['username'],
                'added' => date("d-m-Y", $result['added']),
                'status' => $result['status'],
                'category' => $this->getCategoryName($result['category']),
                'magnet' => $this->getMagnetLink($result['info_hash'], $result['name'])
            );
        }

        return $this->torrentInfo;
    }

    private function getCategoryName($key): ?string
    {
        return self::CATEGORIES[$key] ?? null;
    }

    private function getMagnetLink($hash, $name): string
    {
        $magnetLink = 'magnet:?xt=urn:btih:' . $hash . '&dn=' . $name;

        foreach (self::TRACKERS as $tracker) {
            $magnetLink .= '&tr=' . rawurlencode($tracker);
        }

        return $magnetLink;
    }

    //TODO
    private function getFileList($id)
    {
        $apiUrl = self::API_FILE_URL . $id;
        $getHtml = httpsGetRequest($apiUrl);
        $results = json_decode($getHtml, true);
        $fileList = null;

        foreach ($results as $result) {
            $fileList[] = array(
                'name' => $result['name'],
                'size' => readableFileSize($result['size'])
            );
        }

        return $fileList;
    }
}