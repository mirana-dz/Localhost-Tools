<?php

namespace App\Controllers;

class HtmlEscapeController
{
    public function index()
    {

        $pageTitle = 'HTML Escape/Unescape';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>HTML Escape/Unescape is a developer tool to escape special characters in HTML strings to their HTML entities or unescape HTML entities to their original characters..</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            if ($_POST['action'] === 'escape') {
                echo htmlspecialchars($input);
            } elseif ($_POST['action'] === 'unescape') {
                echo html_entity_decode($input);
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/html_escape_unescape.php');
    }
}