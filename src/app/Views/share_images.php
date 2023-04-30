<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form-file', 'image-upload');
$form->input('file', 'Choose an image to upload:', 'file');
$form->button('action', 'share', 'Share Image', array('class' => 'button'));
echo $form->render();
?>
    <div id="validate-error"></div>
    <div class="result-container">
        <div id="result-display"></div>
    </div>

    <script src="assets/js/custom-file-input.js"></script>
    <link href="assets/css/custom-file-input.css" rel="stylesheet" type="text/css">

<?php
include '../app/includes/footer.php'; ?>