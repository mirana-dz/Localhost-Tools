<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->input('input', 'Input Domain:', 'text');
$form->button('action', 'lookUp', 'Look up', array('class' => 'button'));
echo $form->render();

echo '<div id="result-display"></div>';

include '../app/includes/footer.php'; ?>