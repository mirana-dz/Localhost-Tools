<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'email-obfuscator');
$form->input('input', 'Enter your email:', 'text', array('class' => 'input-email'));
$form->input('email_title', 'Title:', 'text');
$form->select('method', 'Method:', array(
    'javascript' => 'Javascript',
    'hex' => 'Hex values'
), 'hex');
$form->button('action', 'obfuscate', 'Obfuscate email', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>