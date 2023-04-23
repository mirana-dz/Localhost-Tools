<?php
include '../app/includes/header.php';

echo $pageDescription;
$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Input:');
$form->html('<b>Select algorithm:</b>
    <div class="nav center">
    <input type="radio" id="x1" name="algorithm" value="crc32" checked>
    <label for="x1" class="radioLabel">CRC32</label>
    
    <input type="radio" id="x2" name="algorithm" value="crc32b">
    <label for="x2" class="radioLabel">CRC32B</label>  
	
    <input type="radio" id="x3" name="algorithm" value="crc32c">
    <label for="x3" class="radioLabel">CRC32C</label>  
</div>');
$form->button('action', 'generate', 'Generate', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>