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
                        url = 'https://www.google.com/search?q=' + input;
                        break;
                    case 'Bing':
                        url = 'https://bing.com/search?q=' + input;
                        break;
                    case 'Duckduckgo':
                        url = 'https://duckduckgo.com/?q=' + input;
                        break;
                    case 'Yahoo':
                        url = 'https://search.yahoo.com/search?p=' + input;
                        break;
                    case 'Yandex':
                        url = 'https://yandex.com/search/?text=' + input;
                        break;
                    case 'Baidu':
                        url = 'https://www.baidu.com/s?wd=' + input;
                        break;
                    case 'Dogpile':
                        url = 'https://www.dogpile.com/serp?q=' + input;
                        break;
                    case 'Millionshort':
                        url = 'https://millionshort.com/search?remove=0&keywords=' + input;
                        break;
                    case 'Zapmeta':
                        url = 'https://ca.zapmeta.com/search?q=' + input;
                        break;
                    case 'Gigablast':
                        url = 'https://www.gigablast.com/search?c=main&q=' + input;
                        break;
                    case 'Etools':
                        url = 'https://www.etools.ch/searchSubmit.do?query=' + input;
                        break;
                    case 'Goo':
                        url = 'https://search.goo.ne.jp/web.jsp?MT=' + input;
                        break;
                    case 'Daum':
                        url = 'https://search.daum.net/search?q=' + input;
                        break;
                    case 'WolframA':
                        url = 'https://www.wolframalpha.com/input?i=' + input;
                        break;
                    case 'Exalead':
                        url = 'https://www.exalead.com/search/web/results/?q=' + input;
                        break;
                    case 'Carrot2':
                        url = 'https://search.carrot2.org/#/search/web/' + input + '/folders';
                        break;
                    case 'Swisscows':
                        url = 'https://swisscows.com/web?query=' + input;
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
                <li><img alt="" src="images/search-engines-icons/duckduckgo.webp">Duckduckg</li>
                <li><img alt="" src="images/search-engines-icons/search.yahoo.webp">Yahoo</li>
                <li><img alt="" src="images/search-engines-icons/yandex.webp">Yandex</li>
                <li><img alt="" src="images/search-engines-icons/baidu.webp">Baidu</li>
                <li><img alt="" src="images/search-engines-icons/dogpile.webp">Dogpile</li>
                <li><img alt="" src="images/search-engines-icons/millionshort.webp">Millionshort</li>
                <li><img alt="" src="images/search-engines-icons/ca.zapmeta.png">Zapmeta</li>
                <li><img alt="" src="images/search-engines-icons/gigablast.webp">Gigablast</li>
                <li><img alt="" src="images/search-engines-icons/etools.webp">Etools</li>
                <li><img alt="" src="images/search-engines-icons/goo.webp">Goo</li>
                <li><img alt="" src="images/search-engines-icons/search.daum.webp">Daum</li>
                <li><img alt="" src="images/search-engines-icons/wolframalpha.webp">WolframA</li>
                <li><img alt="" src="images/search-engines-icons/exalead.webp">Exalead</li>
                <li><img alt="" src="images/search-engines-icons/search.carrot2.webp">Carrot2</li>
                <li><img alt="" src="images/search-engines-icons/swisscows.webp">Swisscows</li>
            </ul>
        </div>
    </div>

<?php
include '../app/includes/footer.php'; ?>