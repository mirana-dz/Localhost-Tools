<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form-2split', 'inputForm');
$form->input('input', 'Enter URL to check:', 'text');
$form->button('action', 'get', 'Get HTTP status code', array('class' => 'button'));
$form->input('result-display', 'HTTP status code:', 'text');
$form->copyDownloadButton();
$form->textarea('result-display1', 'HTTP response header:');
echo $form->render();

include '../app/includes/footer.php'; ?>