<?php
include '../app/includes/header.php';

//echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->input('sender', 'Sender\'s Name:', 'text');
$form->input('recipient', 'Recipient\'s Name:', 'text');
$form->input('subject', 'Subject Line:', 'text');
$form->input('topic', 'Topic:', 'text');
$form->html('<b>Tone:</b>
    <div class="nav center">
    <input type="radio" id="x1" name="tone" value="Professional" checked>
    <label for="x1" class="radioLabel">Professional</label>
    
    <input type="radio" id="x2" name="tone" value="Casual">
    <label for="x2" class="radioLabel">Casual</label>  
	
    <input type="radio" id="x3" name="tone" value="Enthusiastic">
    <label for="x3" class="radioLabel">Enthusiastic</label> 
	
    <input type="radio" id="x4" name="tone" value="Informational">
    <label for="x4" class="radioLabel">Informational</label> 
	
    <input type="radio" id="x5" name="tone" value="Funny">
    <label for="x5" class="radioLabel">Funny</label> 
</div>');

$form->button('action', 'generate', 'Generate Email', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>