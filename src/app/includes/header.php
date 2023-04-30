<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <title><?php echo $pageTitle . ' | ' . SITE_NAME; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <link href="assets/images/favicon.png" rel="shortcut icon"/>
    <!-- CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Javascript -->
    <script src="assets/modules/jquery-3.6.4.min.js"></script>
</head>

<body>
<!-- Header -->
<div id="header" class="topHeader">
    <a title="" href="?route=index"><img src="assets/images/mirana-dz_localhost_tools.png" width="200" height="70"
                                         alt="MIRANA-DZ localhost tools"></a>
</div>
<!-- Application Main -->
<div class="application_main">

<?php

// Page Path 	
$path = match ($pageTitle) {
    'Home' => [
        [SITE_NAME, 'Home Page'],
    ],
    'About' => [
        ['<a href="./?route=index">Home</a>', 'About Page'],
    ],
    'My Bookmarks' => [
        ['<a href="./?route=index">Home</a>', 'My Bookmarks'],
    ],
    default => [
        ['<a href="./?route=index">Home</a>', '<a href="#' . $pageCategory . '">' . $pageCategory . '</a>', $pageTitle],
    ],
};

$pathHtml = '';
foreach ($path as $p) {
    $pathHtml .= '<div class="path"><div class="path_text">/</div><div class="angle-right"></div>';
    foreach ($p as $i => $text) {
        if ($i > 0) {
            $pathHtml .= '<div class="angle-right"></div>';
        }
        $pathHtml .= '<div class="path_text">' . $text . '</div>';
    }
    $pathHtml .= '</div>';
}
echo $pathHtml;

$vowels = [' ', '/'];
$pageCategorySvg = str_replace($vowels, '_', $pageCategory);
$pageTitleHtml = ($pageTitle === 'Home')
    ? '<h2 class="home_page_svg">Useful Tools for Developers</h2>'
    : '<h3 class="' . strtolower($pageCategorySvg) . '_svg">' . $pageTitle . '</h3>';
echo '<header class="header">' . $pageTitleHtml . '</header>';
echo ($pageTitle === 'Home')
    ? '<div class="containerHome">'
    : '<div class="container">';