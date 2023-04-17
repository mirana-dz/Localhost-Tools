<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form-2split', 'inputForm');
$form->input('input', 'Enter Password:', 'text');
$form->button('action', 'generate', 'Generate Hash', array('class' => 'button'));
$form->copyDownloadButton();
$form->input('result-display', 'vBulletin Password:', 'text');
$form->input('result-display1', 'Salt:', 'text');
echo $form->render();

include '../app/includes/footer.php'; ?>