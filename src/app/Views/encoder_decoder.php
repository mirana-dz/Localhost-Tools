<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Input:');

if ($pageTitle === 'Base64 Encoder/Decoder') {
    $form->html('<b>Select algorithm:</b>
    <div class="nav center">
    <input type="radio" id="x1" name="algorithm" value="base64" checked>
    <label for="x1" class="radioLabel">Base64</label>

    <input type="radio" id="x2" name="algorithm" value="base58">
    <label for="x2" class="radioLabel">Base58</label> 

    <input type="radio" id="x3" name="algorithm" value="base32">
    <label for="x3" class="radioLabel">Base32</label>
</div>');
}
$form->button('action', 'encode', 'Encode', array('class' => 'button'));
$form->button('action', 'decode', 'Decode', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>