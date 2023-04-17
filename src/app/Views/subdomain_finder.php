<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'form-flex');
$form->html('<div class="flex-wrap">');
$form->input('input', '', 'text', array('class' => 'flex', 'placeholder' => 'eg: exemple.com'));
$form->button('action', 'scan', 'Run Scan', array('class' => 'button'));
$form->html('</div>');
echo $form->render();

echo '<div id="validate-error"></div>';
echo '<div id="result-display"></div>';

include '../app/includes/footer.php'; ?>