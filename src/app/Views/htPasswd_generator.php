<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'htPasswd');
$form->input('username', 'Username:', 'text');
$form->input('password', 'Password:', 'text');
$form->button('action', 'generate', 'Generate', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->input('result-display', 'Generated password:', 'text');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>