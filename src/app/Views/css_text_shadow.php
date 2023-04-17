<?php
include '../app/includes/header.php';

echo $pageDescription; ?>

    <script src="modules/spectrum-1.8.1/spectrum.js"></script>
    <link rel="stylesheet" type="text/css" href="modules/spectrum-1.8.1/spectrum.css">

    <style>
        #text-preview {
            margin-top: 5px;
            font-size: 36px;
        }
    </style>

    <div class="row-sm">
        <div class="col-sm">
            <div class="form-group">
                <label for="h-shadow" class="field-label block">Horizontal Length</label>
                <div class="range-group">
                    <input id="h-shadow" type="range" class="range-slider" aria-labelledby="lblRange" min="-100"
                           max="100" value="1">
                    <input type="number" id="h-shadow-value" value="1" class="range-value"
                           aria-label="h-shadow-value" min="-100" max="100">
                </div>
            </div>
            <div class="form-group">
                <label for="v-shadow" class="field-label block">Vertical Length</label>
                <div class="range-group">
                    <input id="v-shadow" type="range" class="range-slider" min="-100"
                           max="100" value="5">
                    <input type="number" id="v-shadow-value" value="5" min="-100" max="100"
                           aria-label="v-shadow-value" class="range-value">
                </div>
            </div>
            <div class="form-group">
                <label for="blur-radius" class="field-label block">Blur Radius</label>
                <div class="range-group">
                    <input id="blur-radius" type="range" class="range-slider" min="0"
                           max="50" value="4">
                    <input type="number" id="blur-radius-value" class="range-value"
                           aria-label="blur-radius-value" value="4" min="0" max="50">
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-sm-2">
                        <label class="field-label block">Shadow Color: </label>
                    </div>
                    <div class="col-sm-2">
                        <div class="input-group color-group">
                            <input id="shadow-color" value='#b45f06' aria-label="shadow-color">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div id="preview-css">
                <div id="text-preview" style="text-shadow: rgb(153, 153, 153) 1px 5px 4px;">
                    Text Shadow
                </div>
            </div>
        </div>
    </div>

    <div class="row-sm">
        <div class="col-sm">
            <div class="form-group">
                <div class="textarea-group">
                    <div class="text-right">
                        <button id="copy-btn">
                            <svg data-icon="clipboard" width="16" height="16" viewBox="0 0 16 16">
                                <desc>clipboard</desc>
                                <path d="M11 2c0-.55-.45-1-1-1h.22C9.88.4 9.24 0 8.5 0S7.12.4 6.78 1H7c-.55 0-1 .45-1 1v1h5V2zm2 0h-1v2H5V2H4c-.55 0-1 .45-1 1v12c0 .55.45 1 1 1h9c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1z"
                                      fill-rule="evenodd"></path>
                            </svg>
                            Copy
                        </button>
                        <button id="download-btn">
                            <svg data-icon="download" width="16" height="16" viewBox="0 0 384 512">
                                <desc>download</desc>
                                <path d="M384 128h-128V0L384 128zM256 160H384v304c0 26.51-21.49 48-48 48h-288C21.49 512 0 490.5 0 464v-416C0 21.49 21.49 0 48 0H224l.0039 128C224 145.7 238.3 160 256 160zM255 295L216 334.1V232c0-13.25-10.75-24-24-24S168 218.8 168 232v102.1L128.1 295C124.3 290.3 118.2 288 112 288S99.72 290.3 95.03 295c-9.375 9.375-9.375 24.56 0 33.94l80 80c9.375 9.375 24.56 9.375 33.94 0l80-80c9.375-9.375 9.375-24.56 0-33.94S264.4 285.7 255 295z"></path>
                            </svg>
                            Download
                        </button>
                    </div>
                    <label class="field-label block" for="toCss">Output CSS:</label>
                    <textarea id="toCss" rows="6">.className {
						text-shadow: 0px 13px 2px #282f8f;
}</textarea>
                </div>
            </div>

        </div>
    </div>

    <script>
        fnCssTextShadow();
        $(function () {
            let shadowColorInput = $('#shadow-color');

            shadowColorInput.spectrum({
                type: "component"
            });

            $(".range-slider").on('input', function () {
                fnCssTextShadow();
            });

            $('.range-value').on('keyup change', function () {
                $('#h-shadow').val($('#h-shadow-value').val());
                $('#v-shadow').val($('#v-shadow-value').val());
                $('#blur-radius').val($('#blur-radius-value').val());
                $('.range-slider').trigger('input');
            });

            shadowColorInput.on('change', function () {
                fnCssTextShadow();
            });

            $('.range-slider').on('input', function () {
                $('#h-shadow-value').val($('#h-shadow').val());
                $('#v-shadow-value').val($('#v-shadow').val());
                $('#blur-radius-value').val($('#blur-radius').val());
            });
        });

        function fnCssTextShadow() {
            let hShadow = $('#h-shadow').val() + "px ";
            let vShadow = $('#v-shadow').val() + "px ";
            let blurRadius = $('#blur-radius').val() + "px ";
            let shadowColor = $('#shadow-color').val();
            let cssShadow = hShadow + vShadow + blurRadius + shadowColor;
            $('#text-preview').css({
                'text-shadow': cssShadow
            });
            let cssText = '.className {';
            cssText += "\n    text-shadow: " + cssShadow + ';';
            cssText += '\n}';

            $('#toCss').val(cssText);
        }

        $('.color-group').click(function () {
            $('#shadow-color').spectrum('toggle');
            return false;
        });

        $('#download_value').click(function () {
            download($('#toCss').val(), 'text-shadow.css', 'text/css;encoding:utf-8');
        });

        $('#copy_value').click(function () {
            copyToClipboard($('#toCss').val());
        });
    </script>

<?php
include '../app/includes/footer.php'; ?>