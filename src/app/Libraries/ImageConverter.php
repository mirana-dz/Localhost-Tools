<?php

namespace App\Libraries;

use Exception;

/**
 * Class ImageConverter
 * A class for converting and resizing images in PHP
 *
 * @package App\Libraries
 */
class ImageConverter
{
    /**
     * @var string $imagePath Path to the original image file
     */
    private string $imagePath;
    /**
     * @var string $imageType Type of the original image file
     */
    private string $imageType;
    /**
     * @var resource $imageResource Resource handle for the original image file
     */
    private $imageResource;
    /**
     * @var string|null $newImageType Type of the converted image file
     */
    private ?string $newImageType;


    /**
     * ImageConverter constructor.
     *
     * @param string $imagePath Path to the original image file
     * @throws Exception If the image type is unsupported
     */
    public function __construct(string $imagePath)
    {
        $this->imagePath = $imagePath;
        $this->imageType = pathinfo($this->imagePath, PATHINFO_EXTENSION);

        $this->imageResource = match ($this->imageType) {
            "jpg", "jpeg" => imagecreatefromjpeg($this->imagePath),
            "png" => imagecreatefrompng($this->imagePath),
            "gif" => imagecreatefromgif($this->imagePath),
            default => throw new Exception("Unsupported image type: $this->imageType"),
        };
    }

    /**
     * Set the format of the converted image file
     *
     * @param string $newImageType Type of the converted image file
     * @throws Exception If the image type is unsupported
     */
    public function setNewFormat(string $newImageType): void
    {
        $this->newImageType = match ($newImageType) {
            "jpg", "jpeg" => "jpeg",
            "png" => "png",
            "gif" => "gif",
            default => throw new Exception("Unsupported image type: $newImageType"),
        };
    }

    /**
     * Resize the original image file to the given width and height
     *
     * @param int $width Width of the resized image
     * @param int $height Height of the resized image
     * @return resource Resource handle for the resized image
     */
    public function resize(int $width, int $height)
    {
        $resizedImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($resizedImage, $this->imageResource, 0, 0, 0, 0, $width, $height, imagesx($this->imageResource), imagesy($this->imageResource));

        return $resizedImage;
    }

    /**
     * Save the converted image file
     *
     * @param string $newImagePath Path to the converted image file
     * @param int $quality Quality of the converted image file (for JPEG and PNG)
     * @throws Exception If the new image format is not specified or is unsupported
     */
    public function save(string $newImagePath, int $quality = 80): void
    {
        switch ($this->newImageType) {
            case "jpeg":
                imagejpeg($this->imageResource, $newImagePath, $quality);
                break;
            case "png":
                imagepng($this->imageResource, $newImagePath, floor(9 * $quality / 100));
                break;
            case "gif":
                imagegif($this->imageResource, $newImagePath);
                break;
            default:
                throw new Exception("No new image format specified");
        }
    }

    /**
     * Class destructor function.
     * Destroys the current image resource to free up memory.
     */
    public function __destruct()
    {
        imagedestroy($this->imageResource);
    }
}