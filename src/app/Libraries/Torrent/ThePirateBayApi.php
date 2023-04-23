<?php

namespace App\Libraries\Torrent;

use Exception;

/**
 * Class ThePirateBayApi
 * Provides access to ThePirateBay's API to search for torrents and retrieve related information.
 * 
 * @package App\Libraries\Torrent
 */
class ThePirateBayApi
{
    /**
     * @var string The API URL used to search for torrents.
     */
    private const API_URL = 'https://apibay.org/q.php?q=';

    /**
     * @var string The API URL used to retrieve the list of files included in a torrent.
     */
    private const API_FILE_URL = 'https://apibay.org/f.php?id=';

    /**
     * @var array The categories of torrents supported by ThePirateBay's API.
     * 
     * Note: Games, Music, ... removed, as a muslim I don't support these categories.
     */
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

    /**
     * @var array The list of trackers used for the magnet links.
     */
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

    /**
     * @var array The list of search results retrieved from ThePirateBay's API.
     */
    public array $results;

    /**
     * @var array|null The detailed information of a selected torrent.
     */
    protected ?array $torrentInfo = null;

    /**
     * Constructor that initializes the search query and retrieves the list of search results.
     *
     * @param string $q The search query to be used in the API call.
     * @throws Exception
     */
    function __construct(string $q)
    {
        $this->torrentInfo = array();
        $this->results = $this->getApiBay($q);
    }

    /**
     * Retrieves torrent information from The Pirate Bay API based on the given search query.
     *
     * @param string $q The search query.
     * @return array|null Returns an array of torrent information if found, otherwise returns null.
     * @throws Exception
     */
    private function getApiBay(string $q): ?array
    {
        $apiUrl = self::API_URL . $q;
        $getHtml = httpsGetRequest($apiUrl);
        $results = json_decode($getHtml, true);

        foreach ($results as $result) {
            // Filter: Games, Music, ... removed, as a muslim I don't support these categories.
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

    /**
     * Retrieves the name of a category based on its key.
     *
     * @param int $key The key of the category.
     * @return string|null The name of the category, or null if the category does not exist.
     */
    private function getCategoryName(int $key): ?string
    {
        return self::CATEGORIES[$key] ?? null;
    }

    /**
     * Generates a magnet link for a torrent using its hash and name.
     *
     * @param string $hash The info hash of the torrent.
     * @param string $name The name of the torrent.
     * @return string The magnet link for the torrent.
     */
    private function getMagnetLink(string $hash, string $name): string
    {
        $magnetLink = 'magnet:?xt=urn:btih:' . $hash . '&dn=' . $name;

        foreach (self::TRACKERS as $tracker) {
            $magnetLink .= '&tr=' . rawurlencode($tracker);
        }

        return $magnetLink;
    }

    /**
     * Retrieves the list of files included in a torrent, given its ID.
     *
     * @param int $id The ID of the torrent.
     * @return array The list of files in the torrent.
     * Each file is represented as an array with the following keys:
     *  - 'name': The name of the file.
     *  - 'size': The size of the file in a human-readable format.
     *  If the torrent ID is invalid, returns an empty array.
     * @throws Exception
     * @todo Implement this method.
     */
    private function getFileList(int $id): array
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