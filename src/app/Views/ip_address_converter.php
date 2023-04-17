<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->input('input', 'Enter an IP Address:', 'text');
$form->button('action', 'convert', 'Convert', array('class' => 'button'));
echo $form->render();

echo '<div id="result-display"></div>';

include '../app/includes/footer.php'; ?>