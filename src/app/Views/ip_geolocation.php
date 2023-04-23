<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->input('input', 'Enter an IP Address:', 'text');
$form->button('action', 'find', 'Find Location', array('class' => 'button'));
echo $form->render();

echo '<div class="result-container"><div id="result-display"></div></div>';

include '../app/includes/footer.php'; ?>