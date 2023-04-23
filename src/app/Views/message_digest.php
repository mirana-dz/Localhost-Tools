<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Input:');
$form->select('algorithm', 'Message Digest:', array(
    'md2' => 'MD2',
    'md4' => 'MD4',
    'md5' => 'MD5',
    'sha1' => 'SHA1',
    'sha224' => 'SHA224',
    'sha256' => 'SHA256',
    'sha384' => 'SHA384',
    'sha512' => 'SHA512'
), 'md5');

$form->button('action', 'encode', 'Generate', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>