<?php include '../app/includes/header.php'; ?>

    <style>
        .resultContainer {
            margin-bottom: 20px;
        }

        .resultContainer a {
            font-size: 18px;
        }

        .torrentSite {
            display: block;
            font-size: 14px;
            color: #70757A;
        }

        .torrentInfos {
            font-size: 15px;
        }
    </style>

<?php
echo $pageDescription;

$form = new Form('POST', 'my-form', 'inputForm');
$form->input('input', 'Input:', 'text');
$form->button('action', 'search', 'Search', array('class' => 'button'));
echo $form->render();

echo '<div id="result-display"></div>';

include '../app/includes/footer.php'; ?>