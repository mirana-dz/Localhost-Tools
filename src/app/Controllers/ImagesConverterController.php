<?php

namespace App\Controllers;

use App\Core\Uploader;
use App\Vendor\ImageConverter;

class ImagesConverterController
{
    public function index()
    {

        $pageTitle = 'Images Converter';
        $pageCategory = 'Images Tools';
        $pageDescription = '<p>Images Converter, Convert JPG to PNG, PNG to JPG and more.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ob_start();

            //$uploadDir = 'uploads';
            $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
            $maxFileSize = 5 * 1024 * 1024; // 5 MB
            $returnFileData = false;

            $uploader = new Uploader(UPLOAD_DIR, $allowedMimeTypes, $maxFileSize, $returnFileData);

            try {
                list($fileName, $fileExtension) = $uploader->uploadFile('file');

                $format = $_POST['format'];

                // Create the image converter object
                $converter = new ImageConverter($uploadDir . '/' . $fileName);

                // Set the new format
                switch ($format) {
                    case 'jpg':
                        $converter->setNewFormat('jpeg');
                        break;
                    case 'png':
                        $converter->setNewFormat('png');
                        break;
                    case 'gif':
                        $converter->setNewFormat('gif');
                        break;
                    default:
                        throw new Exception("Unsupported image format: $format");
                }
                //TODO
                // Resize the image
                //$resizedImage = $converter->resize(400, 400);

                // Generate a unique filename for the converted image
                $convertedFileName = uniqid('', true) . '.' . $format;
                $convertedFilePath = $uploadDir . '/' . $convertedFileName;

                // Save the converted image
                $converter->save($convertedFilePath);

                echo 'Image conversion and upload successful.';
                echo '<br>' . $convertedFilePath;
                echo '<img src="' . $convertedFilePath . '" alt="barbaris localhost tools">';

            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/images_converter.php');
    }
}