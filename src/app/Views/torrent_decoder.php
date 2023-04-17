<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form-file1', 'torrent-decoder');
$form->input('torrent_file', 'Choose a Torrent file to upload:', 'file');
$form->button('action', 'decode', 'Decode', array('class' => 'button'));
echo $form->render();
?>
    <div id="validate-error"></div>
    <div id="result-display"></div>

    <script>
        function loadScript(url) {
            $.getScript(url);
        }

        $(document).ready(function () {
            $('#my-form-file1').on('submit', function (e) {
                e.preventDefault();
                if ($(this).valid()) {
                    var formData = new FormData(this);
                    $.ajax({
                        type: 'POST',
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            $('#result-display').html(response);
                            // for div panel
                            loadScript('js/app.js');
                        }
                    });
                }
            });
        });

    </script>

    <script src="js/custom-file-input.js"></script>
    <link href="css/custom-file-input.css" rel="stylesheet" type="text/css">

<?php
include '../app/includes/footer.php'; ?>