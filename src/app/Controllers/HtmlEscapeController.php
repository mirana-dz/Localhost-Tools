<?php

namespace App\Controllers;

class HtmlEscapeController
{
    public function index(): void
    {

        $pageTitle = 'HTML Escape/Unescape';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>HTML Escape/Unescape is a developer tool to escape special characters in HTML strings to their HTML entities or unescape HTML entities to their original characters..</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/html_escape_unescape.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $action = trim($_POST['action'] ?? '');


        if (empty($input) || empty($action)) {
            echo 'Invalid input.';
            return;
        }

        if ($action === 'escape') {
            $result = htmlspecialchars($input);
        } elseif ($action === 'unescape') {
            $result = html_entity_decode($input);
        }

        echo $result;
    }
}