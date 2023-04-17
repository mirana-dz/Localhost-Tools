<?php
include '../app/includes/header.php';

echo $pageDescription;
?>
    <style>
        /* UI //TODO ... */
        .ui-helper-hidden {
            display: none
        }

        .ui-helper-hidden-accessible {
            border: 0;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px
        }

        .ui-helper-reset {
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
            line-height: 1.3;
            text-decoration: none;
            font-size: 100%;
            list-style: none
        }

        .ui-helper-clearfix:before, .ui-helper-clearfix:after {
            content: "";
            display: table;
            border-collapse: collapse
        }

        .ui-helper-clearfix:after {
            clear: both
        }

        .ui-helper-clearfix {
            min-height: 0
        }

        .ui-helper-zfix {
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            position: absolute;
            opacity: 0;
            filter: Alpha(Opacity=0)
        }

        .ui-front {
            z-index: 100
        }

        .ui-autocomplete {
            position: absolute;
            top: 0;
            left: 0;
            cursor: default;
            z-index: 10000000;
            list-style: none;
            padding: 0;
            margin: 0;
            display: block;
            outline: none;
            font-family: "Roboto", Arial, Helvetica, sans-serif;
            font-size: 14px;
            border: 1px solid #bbb;
            border-top: 0;
            background: #fff;
            max-height: 300px;
            overflow-x: hidden;
            overflow-y: auto
        }

        .ui-autocomplete .ui-menu {
            position: absolute
        }

        .ui-autocomplete .ui-menu-item {
            position: relative;
            color: #000;
            margin: 0;
            padding: 8px 10px;
            cursor: pointer;
            min-height: 0;
            list-style-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7);
            background: #F2F4FA;
            border-bottom: 1px solid #DCE1EE;
            -webkit-box-shadow: inset 0 1px #fff, inset 0 0 0 1px rgba(255, 255, 255, .5);
            -moz-box-shadow: inset 0 1px #fff, inset 0 0 0 1px rgba(255, 255, 255, .5);
            -o-box-shadow: inset 0 1px #fff, inset 0 0 0 1px rgba(255, 255, 255, .5);
            box-shadow: inset 0 1px #fff, inset 0 0 0 1px rgba(255, 255, 255, .5)
        }

        .ui-autocomplete .ui-menu-item:hover {
            background: #DCE1EE;
        }

        .ui-menu-item-wrapper {
            position: relative;
            padding: 3px 1em 3px .4em;
            /*background: #000;*/
            /*max-width: 500px;*/
            width: clamp(200px, 100%, 1200px);
        }

        input.ui-autocomplete-loading {
            background: url("images/blue-loading.gif") right center no-repeat;
        }

    </style>
    <script src="modules/jquery-ui-1.13.1/jquery-ui.min.js"></script>
    <script>
        function searchByTerm() {
            const input = $('#dorksList').val();
            let url = 'https://www.google.com/search?q=' + input;
            if ($("form").valid()) {
                window.open(url);
            }
        }

        function searchByTarget() {
            const inputTarget = $('#inputTarget').val(),
                selectDork = $('#selectDork').val();
            let dork1 = 'site:' + inputTarget + ' ext:doc | ext:docx | ext:odt | ext:rtf | ext:sxw | ext:psw | ext:ppt | ext:pptx | ext:pps | ext:csv',
                dork2 = 'site:' + inputTarget + ' intitle:index.of',
                dork3 = 'site:' + inputTarget + ' ext:xml | ext:conf | ext:cnf | ext:reg | ext:inf | ext:rdp | ext:cfg | ext:txt | ext:ora | ext:ini | ext:env',
                dork4 = 'site:' + inputTarget + ' ext:sql | ext:dbf | ext:mdb',
                dork5 = 'site:' + inputTarget + ' ext:log',
                dork6 = 'site:' + inputTarget + ' ext:bkf | ext:bkp | ext:bak | ext:old | ext:backup',
                dork7 = 'site:' + inputTarget + ' inurl:login | inurl:signin | intitle:Login | intitle:"sign in" | inurl:auth',
                dork8 = 'site:' + inputTarget + ' intext:"sql syntax near" | intext:"syntax error has occurred" | intext:"incorrect syntax near" | intext:"unexpected end of SQL command" | intext:"Warning: mysql_connect()" | intext:"Warning: mysql_query()" | intext:"Warning: pg_connect()"',
                dork9 = 'site:' + inputTarget + ' "PHP Parse error" | "PHP Warning" | "PHP Error"',
                dork10 = 'site:' + inputTarget + ' ext:php intitle:phpinfo "published by the PHP Group"',
                dork11 = 'site:pastebin.com | site:paste2.org | site:pastehtml.com | site:slexy.org | site:snipplr.com | site:snipt.net | site:textsnip.com | site:bitpaste.app | site:justpaste.it | site:heypasteit.com | site:hastebin.com | site:dpaste.org | site:dpaste.com | site:codepad.org | site:jsitor.com | site:codepen.io | site:jsfiddle.net | site:dotnetfiddle.net | site:phpfiddle.org | site:ide.geeksforgeeks.org | site:repl.it | site:ideone.com | site:paste.debian.net | site:paste.org | site:paste.org.ru | site:codebeautify.org  | site:codeshare.io | site:trello.com "' + inputTarget + '"',
                dork12 = 'site:github.com | site:gitlab.com "' + inputTarget + '"',
                dork13 = 'site:stackoverflow.com "' + inputTarget + '"',
                dork14 = 'site:' + inputTarget + ' inurl:signup | inurl:register | intitle:Signup',
                url = '';

            switch (selectDork) {
                case '1':
                    url = 'https://www.google.com/search?q=' + dork1;
                    break;
                case '2':
                    url = 'https://www.google.com/search?q=' + dork2;
                    break;
                case '3':
                    url = 'https://www.google.com/search?q=' + dork3;
                    break;
                case '4':
                    url = 'https://www.google.com/search?q=' + dork4;
                    break;
                case '5':
                    url = 'https://www.google.com/search?q=' + dork5;
                    break;
                case '6':
                    url = 'https://www.google.com/search?q=' + dork6;
                    break;
                case '7':
                    url = 'https://www.google.com/search?q=' + dork7;
                    break;
                case '8':
                    url = 'https://www.google.com/search?q=' + dork8;
                    break;
                case '9':
                    url = 'https://www.google.com/search?q=' + dork9;
                    break;
                case '10':
                    url = 'https://www.google.com/search?q=' + dork10;
                    break;
                case '11':
                    url = 'https://www.google.com/search?q=' + dork11;
                    break;
                case '12':
                    url = 'https://www.google.com/search?q=' + dork12;
                    break;
                case '13':
                    url = 'https://www.google.com/search?q=' + dork13;
                    break;
                case '14':
                    url = 'https://www.google.com/search?q=' + dork14;
                    break;
            }

            window.open(url);
        }

        function searchByBuilder() {
            const inputBuilder = $('#inputBuilder').val();
            let url = 'https://www.google.com/search?q=' + inputBuilder;

            window.open(url);
        }


        $(document).ready(function () {

            const category = $('#selectCategory').val();

            $('#dorksList').keyup(function () {
                let category = $('#selectCategory').val();
                $("#dorksList").autocomplete("option", "source", 'autocomplete.php?category=' + category);
            });

            $("#dorksList").autocomplete({
                minLength: 2,
                delay: 500,
                source: 'autocomplete.php?category=' + category,
                autoFocus: true,
                open: function () {
                    $('#dorksList').autocomplete("widget").width('69%')
                }
            });
        });
    </script>

    <div class="wrapper">
        <div class="tabs">
            <div class="tab">
                <input type="radio" name="css-tabs" id="tab-1" checked class="tab-switch">
                <label for="tab-1" class="tab-label">Search by term</label>
            </div>
            <div class="tab">
                <input type="radio" name="css-tabs" id="tab-2" class="tab-switch">
                <label for="tab-2" class="tab-label">Specific target</label>
            </div>
            <div class="tab">
                <input type="radio" name="css-tabs" id="tab-3" class="tab-switch">
                <label for="tab-3" class="tab-label">Builder</label>
            </div>
        </div>
        <div class="pane">

            <!--- ============================== tab-1Div: Search by term ============================== --->
            <div id="tab-1Div" class="tab-content">
                <p>Uses predefined dorks and/or official lists from exploit-db.com (<a
                            href="https://www.exploit-db.com/google-hacking-database"
                            title="Google Hacking Database" target="_blank">Google Hacking Database</a>).</p>
                <form id="dorksByTerm" name="inputForm">
                    <label for="dorksList" class="field-label block">Search term</label>
                    <input type="text" name="input" id="dorksList" value="">
                    <label for="selectOption" class="field-label block">Category</label>
                    <div class="selectDiv">
                        <select id="selectCategory" name="selectCategory">
                            <option value="google_dorks_all_cat" selected>All Category</option>
                            <option value="advisories_and_vulnerabilities">Advisories and Vulnerabilities</option>
                            <option value="error_messages">Error Messages</option>
                            <option value="files_containing_juicy_info">Files Containing Juicy Info</option>
                            <option value="files_containing_passwords">Files Containing Passwords</option>
                            <option value="files_containing_usernames">Files Containing Usernames</option>
                            <option value="footholds">Footholds</option>
                            <option value="network_or_vulnerability_data">Network or Vulnerability Data</option>
                            <option value="pages_containing_login_portals">Pages Containing Login Portals</option>
                            <option value="sensitive_directories">Sensitive Directories</option>
                            <option value="sensitive_online_shopping_info">Sensitive Online Shopping Info</option>
                            <option value="various_online_devices">Various Online Devices</option>
                            <option value="vulnerable_files">Vulnerable Files</option>
                            <option value="vulnerable_servers">Vulnerable Servers</option>
                            <option value="web_server_detection">Web Server Detection</option>
                        </select>
                    </div>
                    <input type="button" id="searchBtn" name="searchBtn" value="Search" class="button margin-top"
                           onclick="searchByTerm()">
                </form>
            </div> <!--- end tab-1Div --->

            <!--- ============================== tab-2Div: Specific target ============================== --->
            <div id="tab-2Div" class="tab-content" style="display:none;">
                <p>Find juicy information indexed by Google about a target website such as directory listing,
                    sensitive files, error messages, login pages, and more. </p>
                <label for="inputTarget" class="field-label block">Target</label>
                <input type="text" name="inputTarget" id="inputTarget" placeholder="www.example.com"
                       value="">
                <label for="selectOption" class="field-label block">Google Dorks</label>
                <div class="selectDiv">
                    <select id="selectDork" name="selectDork">
                        <option value="1" selected>Publicly exposed documents</option>
                        <option value="2">Directory listing vulnerabilities</option>
                        <option value="3">Configuration files exposed</option>
                        <option value="4">Database files exposed</option>
                        <option value="5">Log files exposed</option>
                        <option value="6">Backup and old files</option>
                        <option value="7">Login pages</option>
                        <option value="8">SQL errors</option>
                        <option value="9">PHP errors / warning</option>
                        <option value="10">phpinfo()</option>
                        <option value="11">Search pastebin.com / pasting sites</option>
                        <option value="12">Search github.com and gitlab.com</option>
                        <option value="13">Search stackoverflow.com</option>
                        <option value="14">Signup pages</option>
                    </select>
                </div>
                <input type="button" id="searchBtn" name="searchBtn" value="Search" class="button margin-top"
                       onclick="searchByTarget()">
            </div> <!--- end tab-2Div --->

            <!--- ============================== tab-3Div: Builder ============================== --->
            <div id="tab-3Div" class="tab-content" style="display:none;">
                <p>Make your own Dorks.</p>

                <div class="search-wrapper">
                    <span class="close-icon"></span>
                    <label for="inputBuilder" class="field-label block">Search</label>
                    <input type="text" name="inputBuilder" id="inputBuilder" value="">
                    <input type="button" id="searchBtn" name="searchBtn" value="Search" class="button margin-top"
                           onclick="searchByBuilder()">
                </div>

                <script>
                    $(document).on("input", "#inputBuilder", function () {
                        $('.close-icon').show();
                    })

                    $('.close-icon').click(function () {
                        $('#inputBuilder').val('');
                        $('.close-icon').hide();
                    })

                    $(document).ready(function () {

                        const $table = $('table.scroll'),
                            $bodyCells = $table.find('tbody tr:first').children();

                        let colWidth;

                        $(window).resize(function () {
                            colWidth = $bodyCells.map(function () {
                                return $(this).width();
                            }).get();

                            $table.find('thead tr').children().each(function (i, v) {
                                $(v).width(colWidth[i]);
                            });
                        }).resize();

                        $(document).on("click", "tr.table-builder-row", function () {
                            const title = $(this).attr("data-title"),
                                inputBuilder = $('#inputBuilder');

                            inputBuilder.val(inputBuilder.val() + title).addClass('x');
                            $('.close-icon').show();
                        });

                        $(document).on("click", "#tab-3", function () {
                            $(window).resize();
                        });

                    });
                </script>

                <style>
                    table.scroll {
                        width: 100%;
                        border-spacing: 0;
                    }

                    table.scroll tbody,
                    table.scroll thead {
                        display: block;
                    }

                    thead tr th {
                        height: 30px;
                        line-height: 30px;
                    }

                    table.scroll tbody {
                        height: 200px;
                        overflow-y: auto;
                        overflow-x: hidden;
                    }

                    tbody td, thead th {
                        padding: 5px;
                    }

                    tbody td:last-child, thead th:last-child {
                        border-right: none;
                        padding-right: 30px;
                    }

                    table.scroll th[scope="col"] {
                        background: #2f2f2f;
                    }

                    table.scroll tr:nth-child(even) {
                        background: #2d2d2d
                    }

                    table.scroll tr:nth-child(odd) {
                        background: #2a2a2a;
                    }

                    table.scroll tr:hover {
                        background: #444444;
                        cursor: pointer;
                    }

                    .centerTxt {
                        text-align: center;
                        margin-right: auto;
                        margin-left: auto;
                    }
                </style>
                <?php
                function parseNodes($nodes): string
                {
                    $html = '';
                    foreach ($nodes as $node) {
                        $html .= '<tr class="table-builder-row" data-title="' . $node->operator . '">';
                        $html .= '<td><b>' . $node->operator . '</b></td>';
                        $html .= '<td>' . $node->purpose . '</td>';
                        $html .= '<td class="centerTxt">' . $node->web . '</td>';
                        $html .= '<td class="centerTxt">' . $node->images . '</td>';
                        $html .= '<td class="centerTxt">' . $node->groups . '</td>';
                        $html .= '<td class="centerTxt">' . $node->news . '</td>';
                        $html .= '</tr>';
                    }
                    return $html;
                }

                $json = file_get_contents('files/google-dorking-builder.json');
                $nodes = json_decode($json);
                $html = parseNodes($nodes);
                ?>

                <header class="separator marginB3"></header>
                <table class="scroll">
                    <thead>
                    <tr>
                        <th scope="col">Operator</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Web</th>
                        <th scope="col">Images</th>
                        <th scope="col">Groups</th>
                        <th scope="col">News</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    echo $html;
                    ?>
                    </tbody>
                </table>

            </div> <!--- end tab-3Div --->
        </div> <!--- end pane --->
    </div> <!--- end wrapper --->

<?php
include '../app/includes/footer.php'; ?>