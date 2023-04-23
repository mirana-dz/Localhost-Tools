<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->input('input', 'Domain or IP Address:', 'text');
$form->select('count', 'Total Ping count:', array(
    '1t' => '1 time',
    '2t' => '2 times',
    '3t' => '3 times',
    '4t' => '4 times',
    '5t' => '5 times',
    '6t' => '6 times',
    '7t' => '7 times',
    '8t' => '8 times',
    '9t' => '9 times',
    '10t' => '10 times'
), '4t');
$form->button('action', 'ping', 'Ping', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Ping result:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>