<?php
include '../app/includes/header.php';

echo $pageDescription;
?>
    <style>
        .resizer {
            font-weight: bold;
            padding: 20px;
        }

        .dimensions {
            padding: 20px 0;
        }

        .resizer_input {
            width: 75px !important;
            padding: 5px;
        }

        .resizer_canvas {
            max-width: 100%;
        }
    </style>
    <div class="resizer">
        <div class="upload_area">
            <label for="file" class="field-label block">Choose an image to upload:</label>
            <input type="file" name="file" id="resizer_file">
        </div>
        <div class="dimensions">
            <table>
                <tr>
                    <th>Width:</th>
                    <th></th>
                    <th>Height:</th>
                </tr>
                <tr>
                    <td><input type="text" id="input_width" class="resizer_input" value="0" aria-label="input_width">
                    </td>
                    <td>X</td>
                    <td><input type="text" id="input_height" class="resizer_input" value="0" aria-label="input_height">
                    </td>
                </tr>
            </table>
            <label>
                <input type="checkbox" id="resizer_aspect" checked>
                Keep Aspect Ratio
            </label>
        </div>

        <canvas id="resizer_canvas" class="resizer_canvas" width="500" height="500" style="display:none"></canvas>
        <div class="center">
            <button id="download_btn" class="button" style="display:none">Download Image</button>
        </div>
    </div>

    <script>
        const fileInput = $('#resizer_file'),
            widthInput = $('#input_width'),
            heightInput = $('#input_height'),
            aspectToggle = document.getElementById('resizer_aspect'),
            canvas = document.getElementById('resizer_canvas'),
            canvasCtx = canvas.getContext('2d');

        let activeImage, originalWidthToHeightRatio;

        fileInput.change(function () {
            const file = this.files[0];
            const reader = new FileReader();

            reader.addEventListener("load", () => {
                openImage(reader.result);
                $(canvas).show();
                $('#download_btn').show();
            });

            reader.readAsDataURL(file);
        });

        widthInput.change(function () {
            if (!activeImage) return;

            const heightValue = aspectToggle.checked ? widthInput.val() / originalWidthToHeightRatio : heightInput.val();

            resize(widthInput.val(), heightValue);
        });

        heightInput.change(function () {
            if (!activeImage) return;

            const widthValue = aspectToggle.checked
                ? heightInput.val() * originalWidthToHeightRatio
                : widthInput.val();

            resize(widthValue, heightInput.val());
        });

        function openImage(imageSrc) {
            activeImage = new Image();

            activeImage.addEventListener("load", () => {
                originalWidthToHeightRatio = activeImage.width / activeImage.height;

                resize(activeImage.width, activeImage.height);
            });

            activeImage.src = imageSrc;
        }

        function resize(width, height) {
            canvas.width = Math.floor(width);
            canvas.height = Math.floor(height);
            widthInput.val(Math.floor(width));
            heightInput.val(Math.floor(height));

            canvasCtx.drawImage(activeImage, 0, 0, Math.floor(width), Math.floor(height));
        }

        $("#download_btn").on("click", function () {
            var dataURL = canvas.toDataURL("image/png");
            var link = $("<a/>");
            link.attr("href", dataURL);
            link.attr("download", "image_resized.png");
            $("body").append(link);
            link[0].click();
            link.remove();
        });
    </script>

    <script src="assets/js/custom-file-input.js"></script>
    <link href="assets/css/custom-file-input.css" rel="stylesheet" type="text/css">

<?php
include '../app/includes/footer.php'; ?>