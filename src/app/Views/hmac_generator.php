<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Input:');
$form->input('input_key', 'Secret Key:', 'text');
$form->select('algorithm', 'Select algorithm:', array(
    'md2' => 'MD2',
    'md4' => 'MD4',
    'md5' => 'MD5',
    'sha1' => 'SHA1',
    'sha224' => 'SHA224',
    'sha256' => 'SHA256',
    'sha384' => 'SHA384',
    'sha512/224' => 'SHA512/224',
    'sha512/256' => 'SHA512/256',
    'sha512' => 'SHA512',
    'sha3-224' => 'SHA3-224',
    'sha3-256' => 'SHA3-256',
    'sha3-384' => 'SHA3-384',
    'sha3-512' => 'SHA3-512',
    'ripemd128' => 'RIPEMD128',
    'ripemd160' => 'RIPEMD160',
    'ripemd256' => 'RIPEMD256',
    'ripemd320' => 'RIPEMD320',
    'whirlpool' => 'WHIRLPOOL',
    'tiger128,3' => 'TIGER128,3',
    'tiger160,3' => 'TIGER160,3',
    'tiger192,3' => 'TIGER192,3',
    'tiger128,4' => 'TIGER128,4',
    'tiger160,4' => 'TIGER160,4',
    'tiger192,4' => 'TIGER192,4',
    'snefru' => 'SNEFRU',
    'snefru256' => 'SNEFRU256',
    'gost' => 'GOST',
    'gost-crypto' =>
        'GOST-CRYPTO',
    'haval128,3' => 'HAVAL128,3',
    'haval160,3' => 'HAVAL160,3',
    'haval192,3' => 'HAVAL192,3',
    'haval224,3' => 'HAVAL224,3',
    'haval256,3' => 'HAVAL256,3',
    'haval128,4' => 'HAVAL128,4',
    'haval160,4' => 'HAVAL160,4',
    'haval192,4' => 'HAVAL192,4',
    'haval224,4' => 'HAVAL224,4',
    'haval256,4' => 'HAVAL256,4',
    'haval128,5' => 'HAVAL128,5',
    'haval160,5' => 'HAVAL160,5',
    'haval192,5' => 'HAVAL192,5',
    'haval224,5' => 'HAVAL224,5',
    'haval256,5' => 'HAVAL256,5'
), 'md5');
$form->button('action', 'encode', 'Generate', array('class' => 'button'));
$form->copyDownloadButton();
$form->textarea('result-display', 'Output:');
echo $form->render();

include '../app/includes/footer.php'; ?>