<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->input('input', 'Enter Password:', 'text');
$form->button('action', 'generate', 'Generate Hash', array('class' => 'button'));
$form->copyDownloadButton();
$form->input('result-display', 'Output:', 'text');
echo $form->render();

include '../app/includes/footer.php'; ?>