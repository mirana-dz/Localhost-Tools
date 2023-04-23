<?php

namespace App\Core;

/**
 * Class Uploader
 *
 * A class for handling file uploads
 */
class Uploader
{
    /*
     * @var string The directory where the uploaded files will be stored
     */
    private string $uploadDir;
    /**
     * @var array The allowed MIME types for uploaded files
     */
    private array $allowedMimeTypes;
    /**
     * @var int The maximum allowed file size in bytes
     */
    private int $maxFileSize;
    /**
     * @var bool Whether to return the file data instead of saving it to disk
     */
    private bool $returnFileData;

    /**
     * Uploader constructor.
     *
     * @param string $uploadDir The directory where the uploaded files will be stored
     * @param array $allowedMimeTypes The allowed MIME types for uploaded files
     * @param int $maxFileSize The maximum allowed file size in bytes
     * @param bool $returnFileData Whether to return the file data instead of saving it to disk
     */
    public function __construct(string $uploadDir, array $allowedMimeTypes, int $maxFileSize, bool $returnFileData = false)
    {
        $this->uploadDir = $uploadDir;
        $this->allowedMimeTypes = $allowedMimeTypes;
        $this->maxFileSize = $maxFileSize;
        $this->returnFileData = $returnFileData;
    }

    /**
     * Uploads a file and returns its filename and extension or file data and extension if $returnFileData is set to true.
     *
     * @param string $fileInputName The name of the file input field in the HTML form
     * @return array The filename and extension or file data and extension of the uploaded file
     * @throws RuntimeException If the uploaded file has errors or is invalid
     */
    public function uploadFile(string $fileInputName): array
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