<?php include '../app/includes/header.php'; ?>

    <div class="path">
        <div class="path_text">/</div>
        <div class="angle-right"></div>
        <div class="path_text">BARBARIS Localhost Tools</div>
        <div class="angle-right"></div>
        <div class="path_text">Home Page</div>
    </div>

    <header class="header"><h2 class="home_page_svg">Useful Tools for Developers</h2></header>

<?php echo $pageDescription; ?>

    <div id="header-search">
        <div class="input-group">
        <span class="search-tools-icon"><svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path
                        d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5 6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg></span>
            <input type="text" id="search-box" class="search-input" placeholder="Type any word to search tools"
                   autocomplete="off">
        </div>

        <div class="search-results" id="index-results"></div>
        <hr>
    </div>

    <script>
        $(document).ready(function () {
            $('#search-box').keyup(function () {
                const search_box = $(this).val();
                $.ajax({
                    url: 'search.php',
                    type: 'post',
                    data: {ajax: 1, search_boxVal: search_box},
                    beforeSend: function () {
                        $("#search-box").css("background", "#313030 url(./images/blue-loading.gif) no-repeat 100%");
                    },
                    success: function (response) {
                        $('#index-results').html(response);
                    },
                    complete: function () {
                        $("#search-box").css("background", "#313030");
                    }
                });
            });
        });
    </script>

<?php
$menu = new GridMenu();
echo $menu->render();

include '../app/includes/footer.php'; ?>