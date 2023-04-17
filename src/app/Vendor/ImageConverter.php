<?php

namespace App\Vendor;

class ImageConverter
{
    private $imagePath;
    private $imageType;
    private $imageResource;
    private $newImageType;

    public function __construct($imagePath)
    {
        $this->imagePath = $imagePath;
        $this->imageType = pathinfo($this->imagePath, PATHINFO_EXTENSION);

        switch ($this->imageType) {
            case "jpg":
            case "jpeg":
                $this->imageResource = imagecreatefromjpeg($this->imagePath);
                break;
            case "png":
                $this->imageResource = imagecreatefrompng($this->imagePath);
                break;
            case "gif":
                $this->imageResource = imagecreatefromgif($this->imagePath);
                break;
            default:
                throw new Exception("Unsupported image type: $this->imageType");
        }
    }

    public function setNewFormat($newImageType)
    {
        switch ($newImageType) {
            case "jpg":
            case "jpeg":
                $this->newImageType = "jpeg";
                break;
            case "png":
                $this->newImageType = "png";
                break;
            case "gif":
                $this->newImageType = "gif";
                break;
            //  default:
            //    throw new Exception("Unsupported image type: $newImageType");
        }
    }

    /* TODO
        public function resize($width, $height)
        {
            $resizedImage = imagecreatetruecolor($width, $height);
            imagecopyresampled($resizedImage, $this->imageResource, 0, 0, 0, 0, $width, $height, imagesx($this->imageResource), imagesy($this->imageResource));

            return $resizedImage;
        }
    */
    public function save($newImagePath, $quality = 80)
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
            //default: TODO
            //     throw new Exception("No new image format specified");
        }
    }

    public function __destruct()
    {
        imagedestroy($this->imageResource);
    }
}