<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form-file', 'image-upload');
$form->input('file', 'Choose an image to upload:', 'file');
$form->select('format', 'Select new format:', array(
    'png' => 'PNG',
    'jpg' => 'JPG',
    'gif' => 'GIF',
    'bmp' => 'BMP'
), 'png');
$form->button('action', 'convert', 'Convert image', array('class' => 'button'));
echo $form->render();
?>

    <div id="result-display"></div>

    <script src="js/custom-file-input.js"></script>
    <link href="css/custom-file-input.css" rel="stylesheet" type="text/css">

<?php
include '../app/includes/footer.php'; ?>