<?php
$pageCategoryLower = strtolower($pageCategory);
$pageCategoryFolder = preg_replace('/[ \/]+/', '_', $pageCategoryLower);

$documentationPage = preg_replace('/[ \/]+/', '_', $pageTitle) . '.html';
$documentationPagePath = '../app/includes/documentations/' . $pageCategoryFolder . DIRECTORY_SEPARATOR . $documentationPage;

if (file_exists($documentationPagePath)) {
    echo '<header class="header"><h3 class="documentation_svg">Documentation</h3></header>';
    include $documentationPagePath;
}
?>
</div><!-- container -->
<?php
if (isset($pageCategory)) {
    $menu = new GridMenu();
    echo $menu->render($pageCategory);
}
?>

<a href="#" onclick="gotoToTop()" id="topButton" data-visible="true">
    <span class="screen-reader-text">Back to Top</span>
    <svg width="32" height="32" viewBox="0 0 100 100">
        <path fill="white"
              d="m50 0c-13.262 0-25.98 5.2695-35.355 14.645s-14.645 22.094-14.645 35.355 5.2695 25.98 14.645 35.355 22.094 14.645 35.355 14.645 25.98-5.2695 35.355-14.645 14.645-22.094 14.645-35.355-5.2695-25.98-14.645-35.355-22.094-14.645-35.355-14.645zm20.832 62.5-20.832-22.457-20.625 22.457c-1.207 0.74219-2.7656 0.57812-3.7891-0.39844-1.0273-0.98047-1.2695-2.5273-0.58594-3.7695l22.918-25c0.60156-0.61328 1.4297-0.96094 2.2891-0.96094 0.86328 0 1.6914 0.34766 2.293 0.96094l22.918 25c0.88672 1.2891 0.6875 3.0352-0.47266 4.0898-1.1562 1.0508-2.9141 1.0859-4.1133 0.078125z"></path>
    </svg>
</a>

<script>
    //Get the button:
    topButton = document.getElementById("topButton");

    // When the user scrolls down 400px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            topButton.style.display = "block";
        } else {
            topButton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function gotoToTop() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>

</div> <!-- application_main -->

<div id="footer" class="footer">
    <p>LOCALHOST TOOLS - <a href="index.php?route=about"><b>MIRANA-DZ</b></a></p>
</div>
<!-- Javascript -->
<script src="assets/js/app.js"></script>
<script src="assets/js/FileSaver.js"></script>
<script src="assets/modules/jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>
<script src="assets/modules/jquery-validation-1.19.5/dist/additional-methods.min.js"></script>
<script src="assets/js/form-validation.js"></script>
</body>
</html>