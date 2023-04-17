<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form-file', 'image-upload');
$form->input('file', 'Choose an image to upload:', 'file');
//TODO
/*$form->select('....', '...:', array(
    '....' => '...',
    '' => ''
), '...');*/
$form->button('action', 'share', 'Share Image', array('class' => 'button'));
echo $form->render();
?>
    <div id="validate-error"></div>

    <div id="result-display"></div>

    <script src="js/custom-file-input.js"></script>
    <link href="css/custom-file-input.css" rel="stylesheet" type="text/css">

<?php
include '../app/includes/footer.php'; ?>