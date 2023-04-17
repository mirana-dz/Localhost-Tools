<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META -->
    <meta charset="utf-8">
    <title><?php echo $pageTitle . ' | ' . SITE_NAME; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <!-- CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <!-- Javascript -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/FileSaver.js"></script>
    <script src="js/app.js"></script>
</head>

<body>
<!-- Header -->
<div id="header" class="topHeader">
    <a title="" href="?route=index"><img src="images/mirana-dz_localhost_tools.png" width="200" height="70"
                                         alt="MIRANA-DZ localhost tools"></a>
</div>
<!-- Application Main -->
<div class="application_main">

<?php
if (isset($pageCategory)) {
    echo '<div class="path"><div class="path_text">/</div><div class="angle-right"></div>
<div class="path_text"><a href="./?route=index">Home</a></div><div class="angle-right"></div>
<div class="path_text"><a href="#' . $pageCategory . '">' . $pageCategory . '</a></div><div class="angle-right"></div>
<div class="path_text">' . $pageTitle . '</div></div>';


    $vowels = array(' ', '/');
    $pageCategorySvg = str_replace($vowels, '_', $pageCategory);

    echo '<header class="header"><h3 class="' . strtolower($pageCategorySvg) . '_svg">' . $pageTitle . '</h3></header>';

    echo '<div class="container">';
}