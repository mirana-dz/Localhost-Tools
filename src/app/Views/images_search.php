<?php
include '../app/includes/header.php';

echo $pageDescription; ?>

    <style>
        .search {
            position: relative;
            width: 100%;
            margin: 0 auto;
        }

        .search-box {
            display: flex;
            flex-wrap: wrap;
        }

        .search-box input {
            /*margin-left: 1.4%;*/
            flex: 1;
            padding-left: 40px;
        }

        .search-icon {
            position: absolute;
            left: 5px;
            top: 9px;
            width: 30px;
            height: 30px;
            overflow: hidden;
            border-radius: 25px;
            cursor: pointer;
        }

        /*
        .search-engine-head {
        margin-top: 10px;
        }
        */
        .search-engine-list {
            display: grid;
            /* adjust the `min` value to your context */
            grid-template-columns: repeat(auto-fill, minmax(12ch, 1fr));
            gap: 0.5rem;
            padding-left: 5px;
            padding-right: 5px;
        }

        .search-engine-list li {
            display: grid;
            grid-template-columns: 0 1fr;
            gap: 1.75em;
            align-items: start;
            font-size: 1rem;
            line-height: 1.25;
            background: #a6780c;
            cursor: pointer;
            padding: 5px;
            /* justify-items: center;*/
            align-items: center;
            color: #000;

        }

        .search-engine {
            margin-top: 10px;
            background: #2f2f2f;
            padding: 10px 5px 5px 5px;
        }

        .search-engine-list li img {
            width: 25px;
            height: 25px;
            border-radius: 15px;
            float: left;
            /*padding-left:25px;*/
        }

    </style>

    <script>
        $(document).ready(function () {

            function doSearch(engine, input) {
                let url = '';

                switch (engine) {
                    case 'Google':
                        url = 'https://www.google.com/search?q=' + input + '&tbm=isch';
                        break;
                    case 'Bing':
                        url = 'https://www.bing.com/images/search?q=' + input;
                        break;
                    case 'Yandex':
                        url = 'https://yandex.com/images/search?text=' + input;
                        break;
                    case 'Flickr':
                        url = 'https://www.flickr.com/search/?text=' + input;
                        break;
                    case 'Baidu':
                        url = 'https://image.baidu.com/search/index?tn=baiduimage&word=' + input;
                        break;
                    case 'Imgur':
                        url = 'https://imgur.com/search?q=' + input;
                        break;
                    case 'Yahoo':
                        url = 'https://images.search.yahoo.com/search/images?p=' + input;
                        break;
                    case 'Twitter':
                        url = 'https://twitter.com/search?f=images&q=' + input;
                        break;
                    case 'Facebook':
                        url = 'https://www.facebook.com/search/photos/?q=' + input;
                        break;
                    case 'Instagram':
                        url = 'https://www.google.com/search?tbm=isch&q=site%253Ainstagram.com+' + input;
                        break;
                    case 'Linkedin':
                        url = 'https://www.google.com/search?tbm=isch&q=site%253Alinkedin.com+' + input;
                        break;
                }

                window.open(url);
            }

            let SearchEngine = 'Google';

            $(".search-engine-list li").click(function () {
                let thisImg = $(this).children().attr('src');
                $('.search-icon').attr('src', thisImg);
                SearchEngine = $(this).text();
            });

            $('button[type="button"]').click(function () {
                let input = $('#inputSearch').val();

                if (input.trim() !== '') {
                    doSearch(SearchEngine, input);
                } else {
                    alert('Please enter a search query.');
                }
            });

        });
    </script>

    <div class="search">
        <form name="inputFormFlex" class="search-box">
            <img class="search-icon" alt="" src="images//search-engines-icons/google.webp">
            <input id="inputSearch" class="sbar" name="input_string" title="Search" type="text" accesskey="s">
            <button type="button" class="button">Search</button>
        </form>
        <div id="validate-error"></div>
        <div class="search-engine">
            <div class="search-engine-head"><strong class="search-engine-tit">Search Engines</strong></div>
            <ul class="search-engine-list">
                <li><img alt="" src="images/search-engines-icons/google.webp">Google</li>
                <li><img alt="" src="images/search-engines-icons/bing.webp">Bing</li>
                <li><img alt="" src="images/search-engines-icons/yandex.webp">Yandex</li>
                <li><img alt="" src="images/search-engines-icons/www.flickr.png">Flickr</li>
                <li><img alt="" src="images/search-engines-icons/baidu.webp">Baidu</li>
                <li><img alt="" src="images/search-engines-icons/imgur.webp">Imgur</li>
                <li><img alt="" src="images/search-engines-icons/yahoo.webp">Yahoo</li>
                <li><img alt="" src="images/search-engines-icons/twitter.webp">Twitter</li>
                <li><img alt="" src="images/search-engines-icons/facbook.webp">Facebook</li>
                <li><img alt="" src="images/search-engines-icons/instagram.webp">Instagram</li>
                <li><img alt="" src="images/search-engines-icons/linkedin.webp">Linkedin</li>
            </ul>
        </div>
    </div>

<?php
include '../app/includes/footer.php'; ?>