<?php
include '../app/includes/header.php';

echo $pageDescription;
?>
    <style>
        canvas {
            max-width: 100%;
            max-height: 100%;
            display: block;
        }

        .container_canvas {
            width: 300px;
            height: 300px;
            border: 1px solid #a6780c;
        }
    </style>

    <div class="row-sm">
        <div class="col-sm">
            <div class="container_canvas">
                <canvas width="300px" height="300px" id="canvas_picker"></canvas>
            </div>
        </div>
        <div class="col-sm">
            <div id="preview-css">
            </div>
        </div>
    </div>

    <div class="row-sm">
        <div class="col-sm">
            <br>
            <div class="upload_area">
                <label class="field-label block" for="imageFileInput">Choose an image to upload:</label>
                <input type="file" id="imageFileInput" accept="image/*">
                <!---- <img id="preview"></img>--->
            </div>

            <label for="hex">HEX:</label>
            <input type="text" id="hex" name="hex" placeholder="" autocomplete="off"
                   value="">
            <label for="rgb">RGB:</label>
            <input type="text" id="rgb" name="rgb" placeholder="" autocomplete="off"
                   value="">
            <label for="hsl">HSL:</label>
            <input type="text" id="hsl" name="hsl" placeholder="" autocomplete="off"
                   value="">
        </div>
    </div>

    <script>
        function rgbToHex(R, G, B) {
            return toHex(R) + toHex(G) + toHex(B)
        }

        function toHex(n) {
            n = parseInt(n, 10);
            if (isNaN(n)) return "00";
            n = Math.max(0, Math.min(n, 255));
            return "0123456789ABCDEF".charAt((n - n % 16) / 16) + "0123456789ABCDEF".charAt(n % 16);
        }

        //https://css-tricks.com/converting-color-spaces-in-javascript/
        function RGBToHSL(r, g, b) {
            // Make r, g, and b fractions of 1
            r /= 255;
            g /= 255;
            b /= 255;

            // Find greatest and smallest channel values
            let cmin = Math.min(r, g, b),
                cmax = Math.max(r, g, b),
                delta = cmax - cmin,
                h = 0,
                s = 0,
                l = 0;

            if (delta == 0)
                h = 0;
            // Red is max
            else if (cmax == r)
                h = ((g - b) / delta) % 6;
            // Green is max
            else if (cmax == g)
                h = (b - r) / delta + 2;
            // Blue is max
            else
                h = (r - g) / delta + 4;

            h = Math.round(h * 60);

            // Make negative hues positive behind 360°
            if (h < 0)
                h += 360;

            // Calculate lightness
            l = (cmax + cmin) / 2;

            // Calculate saturation
            s = delta == 0 ? 0 : delta / (1 - Math.abs(2 * l - 1));

            // Multiply l and s by 100
            s = +(s * 100).toFixed(1);
            l = +(l * 100).toFixed(1);

            return "hsl(" + h + "°, " + s + "%, " + l + "%)";
        }

        const canvas = document.getElementById('canvas_picker');
        const context = canvas.getContext('2d');
        const imageObj = new Image();

        //https://github.com/sdqali/hugo/blob/master/static/demos/canvas_fitting.html
        let fitImageOn = function (canvas, imageObj) {
            let imageAspectRatio = imageObj.width / imageObj.height,
                canvasAspectRatio = canvas.width / canvas.height,
                renderableHeight, renderableWidth, xStart, yStart;

            // If image's aspect ratio is less than canvas's we fit on height
            // and place the image centrally along width
            if (imageAspectRatio < canvasAspectRatio) {
                renderableHeight = canvas.height;
                renderableWidth = imageObj.width * (renderableHeight / imageObj.height);
                xStart = (canvas.width - renderableWidth) / 2;
                yStart = 0;
            }

                // If image's aspect ratio is greater than canvas's we fit on width
            // and place the image centrally along height
            else if (imageAspectRatio > canvasAspectRatio) {
                renderableWidth = canvas.width
                renderableHeight = imageObj.height * (renderableWidth / imageObj.width);
                xStart = 0;
                yStart = (canvas.height - renderableHeight) / 2;
            }

            // Happy path - keep aspect ratio
            else {
                renderableHeight = canvas.height;
                renderableWidth = canvas.width;
                xStart = 0;
                yStart = 0;
            }
            context.drawImage(imageObj, xStart, yStart, renderableWidth, renderableHeight);
        };


        $(document).ready(function () {
            imageObj.src = 'images/color-picker.png';

            imageObj.onload = function () {
                fitImageOn(canvas, imageObj)
            };

            $('#canvas_picker').click(function (event) {
                const offset = $(this).offset();
                let x = event.pageX - offset.left;
                let y = event.pageY - offset.top;
                let imgData = context.getImageData(x, y, 1, 1);
                let R = imgData.data[0];
                let G = imgData.data[1];
                let B = imgData.data[2];
                // let A = imgData.data[3];
                let rgb = R + ',' + G + ',' + B;
                // convert RGB to HEX
                let hex = '#' + rgbToHex(R, G, B);
                let hsl = RGBToHSL(R, G, B)
                // making the color the value of the input
                $('#hex').val(hex);
                $('#rgb').val(rgb);
                $('#hsl').val(hsl);
                $('#preview-css').css("background-color", hex);
            });
        });

        $(function () {
            $("#imageFileInput").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        // console.log(event.target.result);
                        context.clearRect(0, 0, canvas.width, canvas.height);
                        imageObj.src = event.target.result;
                        fitImageOn(canvas, imageObj)
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

    <script src="js/custom-file-input.js"></script>
    <link href="css/custom-file-input.css" rel="stylesheet" type="text/css">

<?php
include '../app/includes/footer.php'; ?>