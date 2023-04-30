<?php

namespace App\Controllers;

use App\Core\Uploader;
use App\Libraries\Torrent\TorrentBencode;

class TorrentDecoderController
{
    public function index(): void
    {

        $pageTitle = 'Torrent Decoder';
        $pageCategory = 'Encoding/Decoding Tools';
        $pageDescription = '<p>This tool will decode a BitTorrent file (.torrent) and display the information within in a human-readable manner.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/torrent_decoder.php');
            return;
        }


        list($fileData, $fileExtension) = $this->uploadFileAction();

        $bcoder = new TorrentBencode;

        $torrent_data = $bcoder->decodeData($fileData);

        $private_checked = '';

        if ($bcoder->isPrivate()) $private_checked = 'checked';

        $file_num = 0;

        $html_files_table = '<table class="tb">
          <tr>
            <th scope="col">&nbsp;</td>		  
            <th scope="col">File name</td>
            <th scope="col" style="width:100px">File size</td>
          </tr>
          <tr>';

        foreach ($bcoder->filelist()['files'] as &$files) {
            ++$file_num;
            $html_files_table .= '<tr><td>' . $file_num . '</td>';
            $html_files_table .= '<td style="text-align: left;">' . $files['name'] . '</td>';
            $html_files_table .= '<td>' . readableFileSize($files['size']) . '</td></tr>';
        }

        $html_files_table .= '</table>';

        echo '<div class="wrapper">
            <div class="tabs">
                <div class="tab">
                    <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
                    <label for="tab-1" class="tab-label">General Information</label>
                </div>
                <div class="tab">
                    <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
                    <label for="tab-2" class="tab-label">Files</label>
                </div>
                <div class="tab">
                    <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
                    <label for="tab-3" class="tab-label">Raw Data</label>
                </div>
            </div>
            <div class="pane">
			
			<!--- ============================== tab-1Div: General Information ============================== --->
                <div id="tab-1Div" class="tab-content">
                <label class="form-label" for="name">Name:</label>
                <input type="text" id="name" name="name" placeholder="" autocomplete="off"
                       value="' . $bcoder->getName() . '">
                <label class="form-label" for="url">Url:</label>
                <input type="text" id="url" name="url" placeholder="" autocomplete="off" value="' . $bcoder->getPublisherUrl() . '">
                <label class="form-label" for="published_by">Published by:</label>
                <input type="text" id="published_by" name="published_by" placeholder=""
                       autocomplete="off" value="' . $bcoder->getPublisher() . '">
                <label class="form-label" for="created_by">Created by:</label>
                <input type="text" id="created_by" name="created_by" placeholder=""
                       autocomplete="off" value="' . $bcoder->getCreatedBy() . '">
                <label class="form-label" for="creation_date">Creation date:</label>
                <input type="text" id="creation_date" name="creation_date" placeholder=""
                       autocomplete="off" value="' . date("d-m-Y H:i:s", $bcoder->getCreationDate()) . '">
				<label class="form-label" for="private">Private torrent:</label>	   
				<input type="checkbox" id="private" name="private" ' . $private_checked . '><br>
                <label class="form-label" for="size">Total Size:</label>
                <input type="text" id="size" name="size" placeholder="" autocomplete="off"
                       value="' . readableFileSize($bcoder->fileList()['total_size']) . '">
                <label class="form-label" for="hash">Hash:</label>
                <input type="text" id="hash" name="hash" placeholder="" autocomplete="off"
                       value="' . $bcoder->getInfoHash() . '">
                <label class="form-label" for="magnet">Magnet link:</label>
                <input type="text" id="magnet" name="magnet" placeholder="" autocomplete="off"
                       value="' . $bcoder->getMagnet() . '">   
                <label class="form-label" for="comment">Comment:</label>	   
				<textarea placeholder="your data here" name="comment" id="text" style="width:95%;" rows="7">' . $bcoder->getComment() . '</textarea>  
                <label class="form-label" for="trackers">Trackers:</label>
              	<textarea placeholder="your data here" name="trackers" id="text" style="width:95%;" rows="7">' . $bcoder->getAnnounce() . '</textarea> 					   
                </div> <!--- end tab-1Div --->
				
			<!--- ============================== tab-2Div: Files ============================== --->
                <div id="tab-2Div" class="tab-content" style="display:none;">
				<p><b>Total files: </b>(' . $bcoder->fileList()['file_count'] . ')</p>
				' . $html_files_table . '
                </div> <!--- end tab-2Div --->
				
			<!--- ============================== tab-3Div: Raw Data ============================== --->
                <div id="tab-3Div" class="tab-content" style="display:none;">
				<textarea name="getRawData" id="getRawData">' . $bcoder->getRawData() . '</textarea>
                </div> <!--- end tab-3Div --->
            </div> <!--- end pane --->
        </div> <!--- end wrapper --->';
        // for div panel
        echo "<script> 
	        function loadScript(url) {
            $.getScript(url);
        }
	
	loadScript('assets/js/app.js'); 

	</script>";
    }

    private function uploadFileAction()
    {

        // $uploadDir = 'uploads';
        $allowedMimeTypes = ['applications/x-bittorrent', 'application/x-bittorrent'];
        $maxFileSize = 5 * 1024 * 1024; // 5 MB
        $returnFileData = true;

        // Check if a file was uploaded
        if (isset($_FILES['torrent_file'])) {
            try {
                // Create an instance of the Uploader class
                $uploader = new Uploader(UPLOAD_DIR, $allowedMimeTypes, $maxFileSize, $returnFileData);

                // Upload the file and get the generated filename  
                return $uploader->uploadFile('torrent_file');
                exit;
            } catch (RuntimeException $e) {
                $errorMessage = $e->getMessage();
                //echo $errorMessage;
            }
        }
    }
}