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
$form->html('<div class="flex-wrap">');
$form->input('input', '', 'text', array('class' => 'flex'));
$form->button('action', 'search', 'Search', array('class' => 'button'));
$form->html('</div>');
$form->html('<div class="nav center">
    <input type="radio" id="x1" name="radio" value="ThePirateBay" checked>
    <label for="x1" class="radioLabel">The Pirate Bay</label>
    
    <input type="radio" id="x2" name="radio" value="1337x">
    <label for="x2" class="radioLabel">1337x</label>  
	
    <input type="radio" id="x4" name="radio" value="Rutor">
    <label for="x4" class="radioLabel">Rutor</label> 
</div>');
echo $form->render();

echo '<hr><br><br>';

echo '<div class="result-container"><div id="result-display"></div></div>';

include '../app/includes/footer.php'; ?>