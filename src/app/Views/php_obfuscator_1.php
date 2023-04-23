<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Input:');
$form->select('functions', 'Select nested functions combination to encode the PHP code:', array(
    'obfu1' => 'strrev(base64_encode(gzdeflate(gzcompress($phpCode))))',
    'obfu2' => 'strrev(base64_encode(gzdeflate(gzdeflate(gzcompress($phpCode)))))',
    'obfu' => 'strrev(base64_encode(gzdeflate(gzdeflate(gzdeflate(gzcompress(gzcompress($phpCode)))))))',
    'obfu4' => 'strrev(base64_encode(gzcompress(gzdeflate(gzcompress(gzdeflate(gzcompress(gzdeflate(gzcompress(gzdeflate(str_rot13($phpCode)))))))))))'
), 'obfu1');
$form->button('action', 'obfuscate', 'Obfuscate', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>