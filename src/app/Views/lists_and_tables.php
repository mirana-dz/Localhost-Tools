<?php include '../app/includes/header.php'; ?>

    <link href="assets/modules/prism.js/prism.css" rel="stylesheet"/>
    <script src="assets/modules/prism.js/prism.js"></script>

<?php
//echo $pageDescription;

$fullPath = '';

if (isset($_GET['Goto'])) {
    $fullPath = '';
    $getGotoPage = explode('/', filter_var($_GET['Goto'], FILTER_SANITIZE_URL));

    if (isset($getGotoPage[0])) {
        $gotoFilePage = ucfirst(strtolower($getGotoPage[0]));
        $gotoFileName = $gotoFilePage . '.php';
        $fullPath = '../app/includes/' . $gotoFileName;
    }

    //echo $fullPath;
}
if (file_exists($fullPath)) {
    include($fullPath);
    echo '<br>
<form>
 <input type="button" class="button" value="<< Go back!" onclick="http_redirect(\'?route=lists_and_tables\')">
</form>';
} else {
    echo '
<style>
.container1 {
  padding: 7px;
  margin-left: 5px;
  margin-right: 5px; 
  margin-top: 5px;
  margin-bottom: 10px;  
  width: 98%;
  box-sizing: border-box;
  display: table;
  background-color: #2f2f2f;
}

.container1:hover {
  opacity: 0.7;
  -webkit-box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.65);
  box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.65);
}	  
	  
.container1> p {
  color: rgb(192, 192, 192);
}	  
</style>

<a class="container1" href="' . getCurrentPage() . '&Goto=ascii_special_characters">
ASCII and ANSI Character Table
<div class="angle-right float-right"></div>	
<p>A list of all ASCII and ANSI characters with names and character codes.</p>
</a>

<a class="container1" href="' . getCurrentPage() . '&Goto=color_tables">
Color Tables
<div class="angle-right float-right"></div>	
<p>This page contains color tables for HTML, CSS and SVG.</p>
</a>	

<a class="container1" href="' . getCurrentPage() . '&Goto=time_zones">
Time Zones
<div class="angle-right float-right"></div>	
<p>A list with all time zones.</p>
</a>

<a class="container1" href="' . getCurrentPage() . '&Goto=top_level_domains">
Top-Level Domains (TLDs)
<div class="angle-right float-right"></div>	
<p>A list with all Top-Level Domains (TLDs).</p>
</a>

<a class="container1" href="' . getCurrentPage() . '&Goto=windows_version_numbers">
Windows Version Numbers
<div class="angle-right float-right"></div>	
<p>A list with version and build numbers of Microsoft Windows.</p>
</a>

<a class="container1" href="' . getCurrentPage() . '&Goto=http_response_status_codes">
HTTP response status codes
<div class="angle-right float-right"></div>	
<p>A list with version and build numbers of Microsoft Windows.</p>
</a>

<a class="container1" href="' . getCurrentPage() . '&Goto=iso_country_list">
ISO Country List - HTML select/dropdown snippet & MYSQL database table
<div class="angle-right float-right"></div>	
<p>Included in this page are the HTML select/dropdown code snippets to generate a list of countries using the ISO-3166-1 and ISO-3166-2 codes.</p>
</a>';
}

include '../app/includes/footer.php'; ?>