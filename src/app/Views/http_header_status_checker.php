<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form-2split', 'inputForm');
$form->input('input', 'Enter URL to check:', 'text', array('class' => 'input-url'));
$form->button('action', 'get', 'Get HTTP status code', array('class' => 'button'));
$form->input('result-display1', 'HTTP status code:', 'text');
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'HTTP response header:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>