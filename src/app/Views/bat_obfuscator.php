<?php
include '../app/includes/header.php';

echo $pageDescription;
$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Input:');
$form->button('action', 'obfuscate', 'Obfuscate', array('class' => 'button'));
$form->copyDownloadButton();
$form->textarea('result-display', 'Output:');
echo $form->render();

include '../app/includes/footer.php'; ?>