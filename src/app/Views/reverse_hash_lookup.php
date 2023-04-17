<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->input('input', 'Hash value:', 'text');
$form->select('algorithm', 'Select algorithm:', array(
    'md2' => 'MD2',
    'md4' => 'MD4',
    'md5' => 'MD5',
    'sha1' => 'SHA1',
    'sha224' => 'SHA224',
    'sha256' => 'SHA256',
    'sha384' => 'SHA384',
    'sha512' => 'SHA512',
    'ntlm' => 'NTLM'
), 'md5');
$form->button('action', 'reverse', 'Reverse', array('class' => 'button'));
echo $form->render();

echo '<div id="result-display"></div>';

include '../app/includes/footer.php'; ?>
