<?php
include '../app/includes/header.php';

//echo $pageDescription;
?>
    <style>
        .language-select-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        #swap-languages {
            border-radius: 50%;
            padding: 4px;
            background-color: #a6780c;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        #swap-languages:hover {
            background-color: #c7900e;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const languageFrom = document.getElementById('language-from');
            const languageTo = document.getElementById('language-to');
            const swapButton = document.getElementById('swap-languages');

            swapButton.addEventListener('click', () => {
                event.preventDefault();
                const temp = languageFrom.value;
                languageFrom.value = languageTo.value;
                languageTo.value = temp;
            });
        });
    </script>
<?php

$form = new Form('POST', 'my-form', 'inputForm');
$form->html('<div class="language-select-container">
  <select id="language-from" name="language-from" style="width: 30%;">
    <option value="en">English</option>
    <option value="es">Spanish</option>
    <option value="fr">French</option>
    <option value="de">German</option>
  </select>

<button id="swap-languages">
  <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="#000000" width="24" height="24">
    <path d="M16.57,9.999L12.001,5.43v3.001H4v2h8.001v3.001L16.57,9.999z M7.43,14.999L12,19.568v-3.001H20v-2H12v-3.001L7.43,14.999z"/>
  </svg>
</button>

  <select id="language-to" name="language-to" style="width: 30%;">
    <option value="es">Spanish</option>
    <option value="en">English</option>
    <option value="fr">French</option>
    <option value="de">German</option>
  </select>
</div>');
$form->textarea('input', 'Input:');
$form->button('action', 'translate', 'Translate', array('class' => 'button'));
$form->copyDownloadButton();
$form->html('<div class="result-container">');
$form->textarea('result-display', 'Output:');
$form->html('</div>');
echo $form->render();

include '../app/includes/footer.php'; ?>