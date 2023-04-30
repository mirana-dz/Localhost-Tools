<?php

namespace App\Controllers;

use App\Core\Uploader;

class Base64ImageController
{
    public function index(): void
    {

        $pageTitle = 'Base64 Image Encoder / Decoder';
        $pageCategory = 'Images Tools';
        $pageDescription = '<p>Converts an image to Base64 by browsing an image file locally. When the process is done, the input image and Base64 output will be displayed accordingly.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            ob_start();

            list($imageData, $imageExtension) = $this->uploadFileAction();

            $return_value = match ($_POST['option']) {
                'txt' => base64_encode($imageData),
                'uri' => $this->base64Uri($imageExtension, $imageData),
                'css_background_image' => $this->base64CssBgImage($imageExtension, $imageData),
                'html_favicon' => $this->base64HtmlFavIcon($imageExtension, $imageData),
                'html_hyperlink' => $this->base64HtmlHyperLink($imageExtension, $imageData),
                'html_img' => $this->base64HtmlImg($imageExtension, $imageData),
                'html_iframe' => $this->base64HtmlIframe($imageExtension, $imageData),
                'javascript_image' => $this->base64JsImage($imageExtension, $imageData),
                'javascript_popup' => $this->base64JsPopUp($imageExtension, $imageData),
                'json' => $this->base64Json($imageExtension, $imageData),
                'xml' => $this->base64Xml($imageExtension, $imageData),
            };

            echo $return_value;
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/base64_image.php');
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
                // Handle any errors that occur during the file upload
                $errorMessage = $e->getMessage();
                echo $errorMessage;
            }
        }
    }

    private function base64Uri($imageExtension, $imageData): string
    {
        return 'data:image/' . $imageExtension . ';base64,' . base64_encode($imageData);
    }

    private function base64CssBgImage($imageExtension, $imageData): string
    {
        return '.base64 {
  background-image: url("data:image/' . $imageExtension . ';base64,' . base64_encode($imageData) . '")
  }';
    }

    private function base64HtmlFavIcon($imageExtension, $imageData): string
    {
        return '<link rel="shortcut icon" href="data:image/' . $imageExtension . ';base64,' . base64_encode($imageData) . '" />';
    }

    private function base64HtmlHyperLink($imageExtension, $imageData): string
    {
        return '<a href="data:image/' . $imageExtension . ';base64,' . base64_encode($imageData) . '"></a>';
    }

    private function base64HtmlImg($imageExtension, $imageData): string
    {
        return '<img alt="" src="data:image/' . $imageExtension . ';base64,' . base64_encode($imageData) . '" />';
    }

    private function base64HtmlIframe($imageExtension, $imageData): string
    {
        return '<iframe src="data:image/' . $imageExtension . ';base64,' . base64_encode($imageData) . '">
  The “iframe” tag is not supported by your browser.
</iframe>';
    }

    private function base64JsImage($imageExtension, $imageData): string
    {
        return 'var img = new Image();
img.src = "data:image/' . $imageExtension . ';base64,' . base64_encode($imageData) . '";
document.body.appendChild(img);';
    }

    private function base64JsPopUp($imageExtension, $imageData): string
    {
        return 'window.onclick = function () {
this.open("data:image/' . $imageExtension . ';base64,' . base64_encode($imageData) . '");
};';
    }

//TODO -----------------------------------------------------

    private function base64Json($imageExtension, $imageData): string
    {
        return '{
  "image": {					
    "mime": "image/' . $imageExtension . '",
    "data": 					
"' . base64_encode($imageData) . '"
  }
}';
    }

    private function base64Xml($imageExtension, $imageData): string
    {
        return '<?xml version="1.0" encoding="UTF-8"?>
<root>
  <image 					
mime="image/' . $imageExtension . '">' . base64_encode($imageData) . '</image>
</root>';
    }
}