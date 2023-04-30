<?php

namespace App\Controllers;

class DefaultRouterSettingsController
{
    public function index(): void
    {
        require_once '..\app\Helpers\PaginationHelper.php';

        $pageTitle = 'Default Router Settings';
        $pageCategory = 'Pentesting Tools';
        $pageDescription = '<p>Default Router Settings is a web-based tool, that enables users to access the IP address and login credentials of multiple routers with ease. With just a few clicks, users can find the default username and password of various routers and modify their network settings as required.</p>';


        if ($_SERVER['REQUEST_METHOD'] === 'GET' & isset($_GET['action'])) {

            ob_start();

            if ($_GET['action'] === 'load') {
                $this->showRouterSettings();
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/default_router_settings.php');
    }

    private function showRouterSettings()
    {
        $loadJsonRouterSettings = file_get_contents('files/default-router-settings.json');
        $getNodes = json_decode($loadJsonRouterSettings);

        $routerSettingsArray = array();

        $getSearchInput = $_GET['search'] ?? '';


        foreach ($getNodes as $node) {
            if (preg_match('/^.*' . $getSearchInput . '/i', $node->brand)) {
                $routerSettingsArray[] = ['brand' => $node->brand, 'ipaddress' => $node->ipaddress, 'user' => $node->user, 'pass' => $node->pass];
            }
        }

        $routerSettingsJson = json_encode($routerSettingsArray);

        function parseNodes($nodes): string
        {
            $html = '';
            foreach ($nodes as $node) {
                $html .= '<tr>';
                $html .= '<td>' . $node->brand . '</td>';
                $html .= '<td>' . $node->ipaddress . '</td>';
                $html .= '<td class="centerTxt">' . $node->user . '</td>';
                $html .= '<td class="centerTxt">' . $node->pass . '</td>';
                $html .= '</tr>';
            }
            return $html;
        }

        $nodes = json_decode($routerSettingsJson);
        $html = parseNodes($nodes);
        $totalBrand = count($nodes);
        echo '<b>Total Brand</b>: ' . $totalBrand;
        $limit = 30;

        $totalPages = ceil($totalBrand / $limit);

        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); //get 1 page when $_GET['page'] <= 0
        $page = min($page, $totalPages); //get last page when $_GET['page'] > $totalPages
        $offset = ($page - 1) * $limit;
        if ($offset < 0) $offset = 0;

        $yourDataArray = array_slice($nodes, $offset, $limit);

        $html = parseNodes($yourDataArray);

        echo '<table class="tb">
            <thead>
            <tr>
                <th scope="col">Brand</th>
                <th scope="col">IP Address</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
            </tr>
            </thead>
            <tbody>' . $html . '</tbody>
        </table>';

        $paginationHTML = generatePagination($page, $totalPages);

        // output the pagination HTML
        echo $paginationHTML;
    }
}