<?php
include '../app/includes/header.php';

echo $pageDescription;
$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Input:');
$form->button('action', 'encode', 'Encode', array('class' => 'button'));
$form->button('action', 'decode', 'Decode', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>
