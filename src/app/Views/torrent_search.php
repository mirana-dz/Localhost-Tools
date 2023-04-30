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

        .pagination1-wrapper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        ul.pagination1 {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        ul.pagination1 li {
            margin: 5px;
        }

        ul.pagination1 li a {
            display: block;
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid #ddd;
            color: #000;
        }

        ul.pagination1 li.active a {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }
    </style>


<?php
echo $pageDescription;

$form = new Form('post', 'my-form', 'inputForm');
$form->html('<div class="flex-wrap">');
$form->input('q', '', 'text', array('class' => 'flex'));
$form->button('action', 'search', 'Search', array('class' => 'button'));
$form->html('</div>');
$form->html('<div class="nav center">
    <input type="radio" id="x1" name="engine" value="ThePirateBay" checked>
    <label for="x1" class="radioLabel">The Pirate Bay</label>
    
    <input type="radio" id="x2" name="engine" value="1337x">
    <label for="x2" class="radioLabel">1337x</label>  
	
    <input type="radio" id="x4" name="engine" value="Rutor">
    <label for="x4" class="radioLabel">Rutor</label> 
</div>');
echo $form->render();

echo '<hr><br><br>';

echo '<div class="result-container"><div id="result-display"></div></div>';

include '../app/includes/footer.php'; ?>