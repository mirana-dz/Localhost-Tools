<?php
include '../app/includes/header.php';

//echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->input('sender', 'Sender\'s Name:', 'text');
$form->input('recipient', 'Recipient\'s Name:', 'text');
$form->input('subject', 'Subject Line:', 'text');
$form->input('topic', 'Topic:', 'text');
$form->select('tone', 'Tone:', array(
    'Professional' => 'Professional',
    'Casual' => 'Casual',
    'Enthusiastic' => 'Enthusiastic',
    'Informational' => 'Informational',
    'Funny' => 'Funny'
), 'Professional');
$form->button('action', 'generate', 'Generate Email', array('class' => 'button'));
$form->copyDownloadButton();
$form->textarea('result-display', 'Output:');
echo $form->render();

include '../app/includes/footer.php'; ?>