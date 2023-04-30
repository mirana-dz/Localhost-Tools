<?php
include '../app/includes/header.php';

echo $pageDescription; ?>

    <style>
        .input-wrapper {
            position: relative;
        }

        #loading {
            display: none;
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
        }

        #loading svg {
            width: 20px;
            height: 20px;
        }
    </style>

    <div class="input-wrapper">
        <input type="text" id="search-box" class="input-search" placeholder="Type any word to search tools" autocomplete="off">
        <div id="loading">
            <svg viewBox="0 0 24 24" fill="#A6A7AB" xmlns="http://www.w3.org/2000/svg">
                <path d="M12,23a9.63,9.63,0,0,1-8-9.5,9.51,9.51,0,0,1,6.79-9.1A1.66,1.66,0,0,0,12,2.81h0a1.67,1.67,0,0,0-1.94-1.64A11,11,0,0,0,12,23Z">
                    <animateTransform attributeName="transform" type="rotate" calcMode="linear" dur="0.75s"
                                      values="0 12 12;360 12 12" repeatCount="indefinite"></animateTransform>
                </path>
            </svg>
        </div>
    </div>
    <div class="search-results" id="index-results"></div>


    <script>
        $(document).ready(function () {
            $('#search-box').keyup(function () {
                const search_box = $(this).val();
                $.ajax({
                    url: 'search.php',
                    type: 'post',
                    data: {ajax: 1, search_boxVal: search_box},
                    beforeSend: function () {
                        $('#loading').show();
                    },
                    success: function (response) {
                        $('#index-results').html(response);
                    },
                    complete: function () {
                        $('#loading').hide();
                    }
                });
            });
        });
    </script>

<?php
$menu = new GridMenu();
echo $menu->render();

include '../app/includes/footer.php'; ?>