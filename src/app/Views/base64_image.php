<?php include '../app/includes/header.php'; ?>

    <div class="form_radio_group">
        <div class="form_radio_group-item">
            <input id="radio-1" type="radio" name="radio" value="1" disabled>
            <label for="radio-1">Encoder</label>
        </div>
        <div class="form_radio_group-item">
            <input id="radio-2" type="radio" name="radio" value="2">
            <label for="radio-2">Decoder</label>
        </div>
    </div>

    <div id="image-to-base64">
        <?php
        echo $pageDescription;
        $form = new Form('POST', 'my-form-file', 'image-upload');
        $form->input('file', 'Choose an image to upload:', 'file');
        $form->select('option', 'Select Output Format:', array(
            'txt' => 'Plain text - Just the Base64 value',
            'uri' => 'Data URI - data:content/type;base64',
            'css_background_image' => 'CSS Background Image - background-image:url()',
            'html_favicon' => 'HTML Favicon - &lt;link rel=icon /&gt;',
            'html_hyperlink' => 'HTML Hyperlink - &lt;a&gt;&lt;/a&gt;',
            'html_img' => 'HTML Image - &lt;img /&gt;',
            'html_iframe' => 'HTML Iframe - &lt;iframe&gt;&lt;/iframe&gt;',
            'javascript_image' => 'JavaScript Image - new Image()',
            'javascript_popup' => 'JavaScript Popup - window.open()',
            'json' => 'JSON - {image:{mime,data}}',
            'xml' => 'XML - &lt;image&gt;&lt;/image&gt;'
        ), 'html_img');
        $form->button('action', 'encode', 'Encode', array('class' => 'button'));
        $form->copyDownloadButton();
        $form->textarea('result-display', 'Output:');
        echo $form->render();
        ?>
        <br>
        <div style="align-items: center; display: flex; justify-content: center;">
            <img id="preview" alt="" src="#" style="max-width: 50%;">
        </div>
    </div>

    <div id="base64-to-image" style="display:none;">
        <p>Converts a Base64 string to an image by pasting a Base64 string in the input field. The output image will
            show up instantly.</p>
        <label class="field-label block" for="text_result">Input Base64</label><textarea id="input_string"
                                                                                         name="input_string"
                                                                                         rows="7"></textarea>
        <br><br>
        <div style="align-items: center; display: flex; justify-content: center;">
            <img id="base64_img_result" alt="" src="" style="max-width: 50%;"></div>
    </div>

    <script>
        $(document).ready(function () {

            $("#radio-1").prop("disabled", true);

            $('#radio-2').click(function () {
                $("#radio-1").prop("disabled", false);
                $("#radio-2").prop("disabled", true);
                $("#image-to-base64").hide();
                $("#base64-to-image").show();
            });

            $('#radio-1').click(function () {
                $("#radio-1").prop("disabled", true);
                $("#radio-2").prop("disabled", false);
                $("#base64-to-image").hide();
                $("#image-to-base64").show();
            });

            $("#fileInputName").change(function () {
                readURL(this);
            });

            $(document).on('keyup', '#input_string', function () {
                $('#base64_img_result').attr('src', $('#input_string').val());
            });

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#preview").attr("src", e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script src="js/custom-file-input.js"></script>
    <link href="css/custom-file-input.css" rel="stylesheet" type="text/css">

<?php
include '../app/includes/footer.php'; ?>