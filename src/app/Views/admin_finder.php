<?php
include '../app/includes/header.php';

echo $pageDescription;

$form = new Form('POST', 'my-form', 'admin-finder');
$form->input('url', 'Please Enter Target Site:', 'text');
$form->button('action', 'submit', 'Submit', array('class' => 'button', 'onclick' => 'doSearch()'));
echo $form->render();
?>

    <style>
        .progress {
            height: 20px;
            background-color: #2f2f2f;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .2);
            width: 90%;
        }

        .progress-bar {
            text-align: center;
            height: 100%;
            transition: width 0.5s ease;
            background-color: #209e9c;
            background: -moz-linear-gradient(top, #209e9c 0%, #066767 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #209e9c), color-stop(100%, #066767));
            background: -webkit-linear-gradient(top, #209e9c 0%, #066767 100%);
            background: -o-linear-gradient(top, #209e9c 0%, #066767 100%);
            background: -ms-linear-gradient(top, #209e9c 0%, #066767 100%);
            background: linear-gradient(to bottom, #209e9c 0%, #066767 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#209e9c', endColorstr='#066767', GradientType=0);
        }

        .progress-bar-title {
            font-weight: bold;
            color: #209e9c;
            padding-bottom: 5px;
            display: block;
        }
    </style>

    <script>
        function doProgressBar(percentage) {
            const progressBar = document.querySelector(".progress-bar");
            progressBar.style.width = percentage + "%";
            progressBar.setAttribute("aria-valuenow", percentage);
            progressBar.innerHTML = percentage + "%";
        }

        function doMultipleAjaxRequests(targetUrl) {
            const deferreds = [];

            $.get('files/wordlist-admin-page.txt', function (data) {

                const wordList = data.split("\n");
                const length = wordList.length;
                let x = 0;

                wordList.forEach(function (item) { //function (item, index)

                    deferreds.push(
                        $.post(window.location, {
                            url: targetUrl,
                            word: item,
                            // delay: index
                        }).then(function (response) {

                            x = x + 1;
                            let percentage = Math.round((x / length) * 100);
                            doProgressBar(percentage);
                            $(".progress-bar").show();
                            $('#Current_status_scanning_for').html('<b>Scanning for :</b> ' + item);
                            $('#Current_status_progress').html('<b>Current status :</b> Scanned ' + x + '/' + length + ' (' + percentage + '%)');
                            $('#resultsTable tr:last').after(response);
                        }));
                });
            }, 'text');

            return deferreds;
        }

        function doSearch() {
            if ($("form").valid()) {
                let resultsDiv = $('#results');
                let targetUrl = $("#url").val();
                let lastCharTargetUrl = targetUrl.substr(targetUrl.length - 1);

                if (lastCharTargetUrl !== '/') {
                    // add '/' last of targetUrl
                    targetUrl = targetUrl + '/';
                }

                $('#Current_status_target').append(targetUrl);

                resultsDiv.empty();
                let resultTableEmpty = '<table id="resultsTable" class="tb"><tbody><tr><th scope="col" style="width:10px">[.]</th><th scope="col">URL</th><th scope="col" style="width:150px">Stat</th></tr></tbody></table>';
                resultsDiv.append(resultTableEmpty);
                $("#Current_status").css({
                    display: "initial"
                });

                let deferreds = doMultipleAjaxRequests(targetUrl);

                $.when.apply(null, deferreds).done(function () {
                    // $("#done").append("<p>All done!</p>");
                    console.log('done');
                });
            }
        }
    </script>

    <!-----
    Target :
    Scanning URL:
    Current status: Scanned ...
     ------>
    <div id="Current_status" style="display: none;">
        <div id="Current_status_target"><b>Target :</b></div>
        <div id="Current_status_scanning_for"><b>Scanning for :</b></div>
        <div id="Current_status_progress"><b>Current status : Scanned</b></div>
        <!-----
    <div class="progress-wrapper html5-progress-bar">
    <span class="progress-bar-title">Scan progress</span>
    <div class="progress-bar-wrapper">
        <progress id="progressbar" value="0" max="100"></progress>
        <span class="progress-value">0%</span>
    </div>
    </div>
         ------>
        <br>
        <span class="progress-bar-title center">Scan progress</span>
        <div class="progress center">
            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                 style="display: none;"></div>
        </div>

        <br>
    </div>

    <div id="results"></div>

<?php
include '../app/includes/footer.php'; ?>