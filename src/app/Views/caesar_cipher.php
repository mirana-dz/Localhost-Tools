<?php
include '../app/includes/header.php';

echo $pageDescription;
?>
    <style>
        #original-line, #shifted-line {
            font-family: monospace;
            white-space: pre;
            font-size: 1.2em;
            letter-spacing: 0.5em;
        }

        .arrow {
            display: inline-block;
            margin: 0 0.2em;
            font-size: 1.2em;
            color: gray;
            margin-bottom: 5px;
        }

        .arrow::before {
            content: "\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193\2193";
            font-family: monospace;
            white-space: pre;
            font-size: 1.2em;
            letter-spacing: 0.5em;
            position: absolute;
            transform: translate(-50%, -50%);
        }
    </style>

    <script>
        $(document).ready(function () {
            var alphabet = 'abcdefghijklmnopqrstuvwxyz';
            var shifted_1 = 'bcdefghijklmnopqrstuvwxyza';
            var original_line = $('#original-line');
            var shifted_line = $('#shifted-line');
            original_line.text(alphabet);
            shifted_line.text(shifted_1);
            $('#shift').on('change', function () {
                var shift = parseInt($(this).val());
                var shifted_alphabet = alphabet.substr(shift) + alphabet.substr(0, shift);
                shifted_line.text(shifted_alphabet);
            });
        });
    </script>

<?php
$shift = '';
for ($i = 1; $i <= 25; $i++) {
    $shift .= "<option value=\"$i\">$i</option>";
}

$form = new Form('POST', 'my-form', 'inputForm');
$form->html('<label for="shift">Select position:</label>
<select name="shift" id="shift" style="width: 30%;">
' . $shift . '</select><br><br>');

$form->html('<div class="center">
        <div id="original-line"></div>
        <div class="arrow"></div>
        <div id="shifted-line"></div>
    </div>');
$form->textarea('input', 'Input:');
$form->button('action', 'encrypt', 'Encrypt', array('class' => 'button'));
$form->button('action', 'decrypt', 'Decrypt', array('class' => 'button'));
$form->copyDownloadButton();
$form->textarea('result-display', 'Output:');
echo $form->render();

include '../app/includes/footer.php'; ?>