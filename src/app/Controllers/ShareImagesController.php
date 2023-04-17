<?php

namespace App\Controllers;

use App\Core\Uploader;

class ShareImagesController
{
    public function index()
    {

        $pageTitle = 'Share Images';
        $pageCategory = 'Images Tools';
        $pageDescription = '<p>Upload and share your images.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ob_start();

            list($imageData, $imageExtension) = $this->uploadFileAction();

            $return_value = $this->uploadImageAndRetrieveUrl($imageData);

            echo $return_value;
            $result = ob_get_clean();
            echo $result;
            exit;
        }
        require_once('../app/views/share_images.php');
    }

    private function uploadFileAction()
    {

        // $uploadDir = 'uploads';
        $allowedMimeTypes = ['image/jpeg', 'image/png'];
        $maxFileSize = 5 * 1024 * 1024; // 5 MB
        $returnFileData = true;

        // Check if a file was uploaded
        if (isset($_FILES['file'])) {
            try {
                // Create an instance of the Uploader class
                $uploader = new Uploader(UPLOAD_DIR, $allowedMimeTypes, $maxFileSize, $returnFileData);

                // Upload the file and get the generated filename
                return $uploader->uploadFile('file');

                exit;
            } catch (RuntimeException $e) {
                $errorMessage = $e->getMessage();
                //echo $errorMessage;
            }
        }
    }

    private function uploadImageAndRetrieveUrl($imageData)
    {
        $token = IMGUR_API_KEY;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $token));
        curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($imageData)));

        $reply = curl_exec($ch);
        curl_close($ch);

        $reply = json_decode($reply);
        return $reply->data->link;
    }
}