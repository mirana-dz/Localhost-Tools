<?php

namespace App\Core;

class Uploader
{
    private $uploadDir;
    private $allowedMimeTypes;
    private $maxFileSize;
    private $returnFileData;

    public function __construct(string $uploadDir, array $allowedMimeTypes, int $maxFileSize, bool $returnFileData = false)
    {
        $this->uploadDir = $uploadDir;
        $this->allowedMimeTypes = $allowedMimeTypes;
        $this->maxFileSize = $maxFileSize;
        $this->returnFileData = $returnFileData;
    }

    public function uploadFile(string $fileInputName)
    {
        $uploadedFile = $_FILES[$fileInputName];

        // Check for errors
        if ($uploadedFile['error'] !== UPLOAD_ERR_OK) {
            throw new RuntimeException('Error uploading file: ' . $uploadedFile['error']);
        }

        // Check if the uploaded file is of the allowed MIME types
        if (!in_array($uploadedFile['type'], $this->allowedMimeTypes)) {
            throw new RuntimeException('Invalid file type');
        }

        // Check if the uploaded file size is within the allowed limit
        if ($uploadedFile['size'] > $this->maxFileSize) {
            throw new RuntimeException('File is too large');
        }

        // Generate a unique filename
        $fileExtension = pathinfo($uploadedFile['name'], PATHINFO_EXTENSION);
        $fileName = uniqid('', true) . '.' . $fileExtension;
        $filePath = $this->uploadDir . '/' . $fileName;

        // Upload the file
        if ($this->returnFileData) {
            // Get the binary data of the uploaded file
            $fileData = file_get_contents($uploadedFile['tmp_name']);
            // Return the file data and file extension
            return [$fileData, $fileExtension];
        } else {
            // Save the uploaded file to disk
            if (!move_uploaded_file($uploadedFile['tmp_name'], $filePath)) {
                throw new RuntimeException('Error saving file');
            }
            // Return the filename and file extension
            return [$fileName, $fileExtension];
        }
    }

}

/*
$uploader = new Uploader('/path/to/upload/directory', ['image/jpeg', 'image/png'], 5242880, true);
$fileData = $uploader->uploadFile('fileInputName');
*/