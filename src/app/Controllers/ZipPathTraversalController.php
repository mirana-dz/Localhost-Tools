<?php

namespace App\Controllers;

use ZipArchive;

class ZipPathTraversalController
{
    public function index(): void
    {

        $pageTitle = 'Zip Path Traversal';
        $pageCategory = 'Pentesting Tools';
        $pageDescription = '<p>Create zip archives that can exploit directory traversal vulnerabilities.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/zip_path_traversal.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $file_name = trim($_POST['file_name'] ?? '');

        if (empty($input) || empty($file_name)) {
            echo 'Invalid input.';
            return;
        }


        $file = tempnam('tmp', 'zip');
        $zip = new ZipArchive();
        //$filename = './output/test112.zip';

        if ($zip->open($file, ZipArchive::CREATE) !== TRUE) {
            exit("Impossible to open the file <$file>\n");
        }

        $zip->addFromString($file_name, $input);
        // TODO add from file ...
        //$zip->addFile('test.php','../../testFromFile.php');
        echo 'Number of files : ' . $zip->numFiles . "\n";
        echo 'Status :' . $zip->status . "\n";
        $zip->close();
        // Download file
        ob_end_clean();
        header('Content-Type: application/zip');
        header('Content-Length: ' . filesize($file));
        header('Content-Disposition: attachment; filename="file.zip"');
        readfile($file);
        unlink($file);
        exit;
    }
}