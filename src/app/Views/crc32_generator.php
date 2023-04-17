<?php
include '../app/includes/header.php';

echo $pageDescription;
$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Input:');
$form->select('algorithm', 'Select algorithm:', array(
    'crc32' => 'CRC32',
    'crc32b' => 'CRC32B'
), 'crc32');
$form->button('action', 'generate', 'Generate', array('class' => 'button'));
$form->copyDownloadButton();
$form->textarea('result-display', 'Output:');
echo $form->render();

include '../app/includes/footer.php'; ?>