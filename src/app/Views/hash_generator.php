<?php
include '../app/includes/header.php';

echo $pageDescription;

// used in ?route=message_digest & ?route=crc32_generator
$md_sha = array(
    '0' => 'MD2',
    '1' => 'MD4',
    '2' => 'MD5',
    '3' => 'SHA1',
    '4' => 'SHA224',
    '5' => 'SHA256',
    '6' => 'SHA384',
    '9' => 'SHA512',
    '30' => 'crc32',
    '31' => 'crc32b',
    '32' => 'crc32c'
);

$algorithms = array_diff_key(hash_algos(), $md_sha);
$option = '';
foreach ($algorithms as $key => $value) {
    $upperValue = strtoupper($value);
    if ($value === 'adler32')
        $option .= "<option value=\"$value\" selected>$upperValue</option>";

    $option .= "<option value=\"$value\">$upperValue</option>";
}

$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Input:');
//TODO
$form->html('<label for="algorithm" class="form-label">Select algorithm:</label>
<select name="algorithm" id="algorithm">
' . $option . '</select><br><br>');

$form->button('action', 'encode', 'Generate', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>