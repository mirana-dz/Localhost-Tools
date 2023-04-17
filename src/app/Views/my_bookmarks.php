<?php
include '../app/includes/header.php';

echo $pageDescription;
?>

    <style>
        .section {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .section-flex-box {
            padding: 10px;
            margin: 10px;
            background: #2f2f2f;
            flex: 44%;
            border-radius: 6px 6px 6px 6px;
        }

        .section_title {
            margin: 5px 0 10px 0;
            padding-bottom: 5px;
            border-bottom: 1px solid #000;
            box-shadow: #404040 0 1px 0;
        }

        .ulContainer ul li {
            position: relative;
            display: inline-block;
            text-align: center;
            padding: 5px;
            margin: 2px;
        }

        .ulContainer ul li:hover {
            background-color: #52565d;
            border-radius: 6px 6px 6px 6px;
        }

        .ulContainer ul {
            padding-left: 0;
            text-align: center;
            width: 100%;
            margin: auto;
        }

        .bookmark-item__icon {
            width: clamp(32px, 32px, 32px);
        }

        .bookmark-item__link {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            position: relative;
        }

        .menu-grid1 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            grid-gap: 20px;
        }

        .menu-item1 {
            text-align: center;
        }

        .menu-item1 img {
            width: 100%;
            height: auto;
        }

        .menu-item1 h3 {
            margin: 10px 0;
        }

        .menu-item1 a {
            text-decoration: none;
            color: inherit;
            transition: transform 0.2s ease-in-out;
        }

        .menu-item1 a:hover {
            transform: translateY(-5px);
        }

        .menu-item1 a:active {
            transform: translateY(0);
        }

        .thumbnail_caption1 {
            padding-top: 2px;
            color: #4B791C;
            margin-bottom: 10px;
            font-family: verdana, sans-serif, arial, helvetica;
            font-size: 12px;
            letter-spacing: 0;
        }

        .col1 {
            padding: .25rem;
            background-color: #2f2f2f;
            border: 1px solid #a6780c;
            border-radius: .25rem;
            max-width: 100%;
            height: auto;
        }

        .col1:hover {
            opacity: .7;
            -webkit-box-shadow: 0 0 13px 3px rgba(0, 0, 0, 0.65);
            box-shadow: 0 0 13px 3px rgba(0, 0, 0, 0.65);
        }

        .toolimg1 {
            display: block !important;
            margin-right: auto !important;
            margin-left: auto !important;
            margin-top: 10px;
            margin-bottom: 10px;
            width: 32px !important;
        }
    </style>

<?php
function parseMain($nodes): string
{
    $html = '';
    foreach ($nodes as $node) {
        $html .= '<div class="section-flex-box">';
        $html .= '<h3 class="section_title">' . $node->title . '</h3>';
        $html .= parseNode($node->nodes);
        $html .= '</div>';
    }
    return $html;
}

function parseNode($node): string
{
    $html = '';
    foreach ($node as $bookmark) {
        $html .= '
		  
<div class="col1"><a href="' . $bookmark->url . '" title="' . $bookmark->text . '" class="menu-item1" target="_blank">
<img class="toolimg1" src="images/bookmarks-icons/' . $bookmark->img_src . '" alt="Base64 Encoder/Decoder">
<h3 class="thumbnail_caption1">' . $bookmark->title . '</h3></a></div>
';
    }
    return '<div class="menu-grid1">' . $html . '</div>';
}

$json = file_get_contents('files/bookmarks.json');
$nodes = json_decode($json);
$html = parseMain($nodes);

echo '<div class="section">' . $html . '</div>';
// --
$json = file_get_contents('files/bookmarks-onion.json');
$nodes = json_decode($json);
$html = parseMain($nodes);
echo '<header class="right-side-header"><h3>ONION SITES</h3></header>';
echo '<div class="section">' . $html . '</div>';

include '../app/includes/footer.php'; ?>