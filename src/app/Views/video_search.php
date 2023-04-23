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
                        url = 'https://www.google.com/search?tbm=vid&q=' + input;
                        break;
                    case 'Bing':
                        url = 'https://www.bing.com/videos/search?q=' + input;
                        break;
                    case 'Yandex':
                        url = 'https://yandex.ru/video/search?text=' + input + '&rpt=imageview';
                        break;
                    case 'Youtube':
                        url = 'https://www.youtube.com/results?search_query=' + input;
                        break;
                    case 'Twitter':
                        url = 'https://twitter.com/search?f=videos&vertical=default&q=' + input;
                        break;
                    case 'Vimeo':
                        url = 'https://vimeo.com/search?q=' + input;
                        break;
                    case 'Itemfix':
                        url = 'https://www.itemfix.com/list?q=' + input;
                        break;
                    case 'Dailymotion':
                        url = 'https://www.dailymotion.com/search/' + input + '/videos';
                        break;
                    case 'Metatube':
                        url = 'https://www.metatube.com/en/videos/?q=' + input;
                        break;
                    case 'Bitchute':
                        url = 'https://www.bitchute.com/search/?query=' + input + '&kind=video';
                        break;
                    case 'PeteyVid':
                        url = 'https://www.peteyvid.com/index.php?q=' + input;
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
            <img class="search-icon" alt="" src="assets/images/search-engines-icons/google.webp">
            <input id="inputSearch" class="sbar" name="input_string" title="Search" type="text" accesskey="s">
            <button type="button" class="button">Search</button>
        </form>
        <div id="validate-error"></div>
        <div class="search-engine">
            <div class="search-engine-head"><strong class="search-engine-tit">Search Engines</strong></div>
            <ul class="search-engine-list">
                <li><img alt="" src="assets/images/search-engines-icons/google.webp">Google</li>
                <li><img alt="" src="assets/images/search-engines-icons/bing.webp">Bing</li>
                <li><img alt="" src="assets/images/search-engines-icons/yandex.webp">Yandex</li>
                <li><img alt="" src="assets/images/search-engines-icons/www.youtube.png">Youtube</li>
                <li><img alt="" src="assets/images/search-engines-icons/twitter.webp">Twitter</li>
                <li><img alt="" src="assets/images/search-engines-icons/vimeo.webp">Vimeo</li>
                <li><img alt="" src="assets/images/search-engines-icons/itemfix.webp">Itemfix</li>
                <li><img alt="" src="assets/images/search-engines-icons/dailymotion.webp">Dailymotion</li>
                <li><img alt="" src="assets/images/search-engines-icons/metatube.webp">Metatube</li>
                <li><img alt="" src="assets/images/search-engines-icons/www.peteyvid.png">PeteyVid</li>
                <li><img alt="" src="assets/images/search-engines-icons/bitchute.webp">bitchute</li>
            </ul>
        </div>
    </div>

<?php
include '../app/includes/footer.php'; ?>