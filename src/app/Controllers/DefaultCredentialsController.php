<?php

namespace App\Controllers;

class DefaultCredentialsController
{
    public function index(): void
    {
        require_once '..\app\Helpers\PaginationHelper.php';

        $pageTitle = 'Default Credentials';
        $pageCategory = 'Pentesting Tools';
        $pageDescription = '<p>One place for all the default credentials to assist pentesters during an engagement, this document has several products default login/password gathered from multiple sources.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'GET' & isset($_GET['action'])) {

            ob_start();

            if ($_GET['action'] === 'load') {
                $this->showRouterSettings();
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/default_credentials.php');
    }

    private function showRouterSettings()
    {
        $loadJsonRouterSettings = file_get_contents('files/DefaultCreds-Cheat-Sheet.json');
        $getNodes = json_decode($loadJsonRouterSettings);

        $routerSettingsArray = array();

        $getSearchInput = $_GET['search'] ?? '';


        foreach ($getNodes as $node) {
            if (preg_match('/^.*' . $getSearchInput . '/i', $node->productvendor)) {
                $routerSettingsArray[] = ['productvendor' => $node->productvendor, 'username' => $node->username, 'password' => $node->password];
            }
        }

        $routerSettingsJson = json_encode($routerSettingsArray);

        function parseNodes($nodes): string
        {
            $html = '';
            foreach ($nodes as $node) {
                $html .= '<tr>';
                $html .= '<td>' . $node->productvendor . '</td>';
                $html .= '<td class="centerTxt">' . $node->username . '</td>';
                $html .= '<td class="centerTxt">' . $node->password . '</td>';
                $html .= '</tr>';
            }
            return $html;
        }

        $nodes = json_decode($routerSettingsJson);
        $html = parseNodes($nodes);
        echo '<b>Total Brand</b>: ' . count($nodes);
        $totalBrand = count($nodes);
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
                <th scope="col">Product Vendor</th>
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