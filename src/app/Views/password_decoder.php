<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->textarea('input', 'Password value:');
$form->select('algorithm', 'Select algorithm:', array(
    'cisco_type_7' => 'Cisco Type 7',
    'cisco_vpn' => 'Cisco VPN Client Password',
    'cpassword' => 'Group Policy Processing'
), 'cisco_type_7');
$form->button('action', 'decode', 'Decode', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

echo '<div class="result-container"><div id="result-display"></div></div>';

include '../app/includes/footer.php'; ?>
