<?php
include '../app/includes/header.php';

echo $pageDescription;
?>
    <script>
        function doWebArchive() {
            let input = $('#input').val();
            let url = 'http://web.archive.org/web/20230000000000*/';
            if (input.trim() !== '') {
                window.open(url + input);
            } else {
                alert('Please enter URL.');
            }
        }

        function doGoogleCache() {
            let input = $('#input').val();
            let url = 'http://webcache.googleusercontent.com/search?q=cache:';
            if (input.trim() !== '') {
                window.open(url + input);
            } else {
                alert('Please enter URL.');
            }
        }

        function doOpenUrl() {
            let input = $('#input').val();
            if (input.trim() !== '') {
                window.open(input);
            } else {
                alert('Please enter URL.');
            }
        }
    </script>

<?php
$form = new Form('POST', 'my-form', 'inputForm');
$form->input('input', 'Get the cached page of any URL:', 'text', array('class' => 'input-url'));
$form->button('action', 'google', 'Google Cache', array('class' => 'button', 'onclick' => 'doGoogleCache()'));
$form->button('action', 'archive', 'Archive.org', array('class' => 'button', 'onclick' => 'doWebArchive()'));
$form->html('<font color="#404040"><strong>&nbsp;|&nbsp;</strong></font>');
$form->button('action', 'encode', 'Live Version', array('class' => 'button', 'onclick' => 'doOpenUrl()'));
echo $form->render();

include '../app/includes/footer.php'; ?>