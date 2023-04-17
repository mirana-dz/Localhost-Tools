<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'email-obfuscator');
$form->input('input', 'Enter your email:', 'text');
$form->input('email_title', 'Title:', 'text');
$form->select('method', 'Method:', array(
    'javascript' => 'Javascript',
    'hex' => 'Hex values'
), 'hex');

$form->button('action', 'obfuscate', 'Obfuscate email', array('class' => 'button'));
$form->copyDownloadButton();
$form->textarea('result-display', 'Output:');
echo $form->render();

include '../app/includes/footer.php'; ?>