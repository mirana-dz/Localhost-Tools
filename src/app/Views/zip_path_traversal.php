<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form-zip', 'zip-path-traversal');
$form->textarea('input', 'Input:');
$form->input('file_name', 'Path & file name:', 'text');
$form->button('action', 'create', 'Create', array('class' => 'button'));
echo $form->render();

include '../app/includes/footer.php'; ?>