<?php

namespace App\Controllers;

class PortsListController
{
    public function index(): void
    {
        require_once '..\app\Helpers\PaginationHelper.php';

        $pageTitle = 'Service Name and Transport Protocol Port Number Registry';
        $pageCategory = 'Pentesting Tools';
        $pageDescription = '<p>List of TCP and UDP port numbers.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'GET' & isset($_GET['action'])) {

            ob_start();

            if ($_GET['action'] === 'load') {
                $this->showPortsList();
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/ports_list.php');
    }

    private function showPortsList()
    {
        $loadJsonPortsList = file_get_contents('files/service-names-port-numbers.json');
        $getNodes = json_decode($loadJsonPortsList);

        $PortsListArray = array();

        $getSearchInput = $_GET['search'] ?? '';


        foreach ($getNodes as $node) {
            if (preg_match('/^.*' . $getSearchInput . '/i', $node->portnumber)) {
                $PortsListArray[] = ['portnumber' => $node->portnumber, 'transportprotocol' => $node->transportprotocol, 'description' => $node->description, 'servicename' => $node->servicename];
            }
        }

        $PortsListJson = json_encode($PortsListArray);

        function parseNodes($nodes): string
        {
            $html = '';
            foreach ($nodes as $node) {
                $html .= '<tr>';
                $html .= '<td>' . $node->portnumber . '</td>';
                $html .= '<td>' . $node->transportprotocol . '</td>';
                $html .= '<td class="centerTxt">' . $node->description . '</td>';
                $html .= '<td class="centerTxt">' . $node->servicename . '</td>';
                $html .= '</tr>';
            }
            return $html;
        }

        $nodes = json_decode($PortsListJson);
        $html = parseNodes($nodes);
        echo '<b>Total Brand</b>: ' . count($nodes);
        $totalPorts = count($nodes);
        $limit = 60;
        $totalPages = ceil($totalPorts / $limit);

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
                <th scope="col">Port Number</th>
                <th scope="col">Transport Protocol</th>
                <th scope="col">Description</th>
                <th scope="col">Service Name</th>
            </tr>
            </thead>
            <tbody>' . $html . '</tbody>
        </table>';

        $paginationHTML = generatePagination($page, $totalPages);

        // output the pagination HTML
        echo $paginationHTML;
    }
}