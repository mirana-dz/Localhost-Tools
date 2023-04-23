<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'form-flex');
$form->html('<div class="flex-wrap">');
$form->input('input', '', 'text', array('class' => 'flex', 'placeholder' => 'Password'));
$form->button('action', 'generate', 'Generate Hash', array('class' => 'button'));
$form->html('</div>');
$form->html('<div id="validate-error"></div>');
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->input('result-display', 'Output:', 'text');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>