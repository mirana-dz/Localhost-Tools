<?php include '../app/includes/header.php'; ?>

    <style>
        .section {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .section-flex-box {
            margin: 10px;
            background: #2f2f2f;
            flex: 200px;
        }

        a.link {
            display: inline-flex;
            text-align: center;
            color: #693;
            text-decoration: none;
            padding: 10px;
        }

        a.link:hover {
            background-color: #3b3b3b;
        }
    </style>

    <script>
        function doReverseSearch($search_engine) {
            if ($("form").valid()) {
                reverseSearchFunction($search_engine);
            }
        }

        function reverseSearchFunction($search_engine) {
            const image_url = document.getElementsByTagName('input')[0].value,
                search_engine = $search_engine;
            let google = 'https://lens.google.com/uploadbyurl?url=' + image_url,
                bing = 'https://www.bing.com/images/search?view=detailv2&iss=sbi&form=SBIIRP&sbisrc=UrlPaste&q=imgurl:' + image_url,
                yandex = 'https://yandex.com/images/search?source=collections&rpt=imageview&url=' + image_url;

            switch (search_engine) {
                case 'google':
                    window.open(google, "_blank");
                    break;
                case 'bing':
                    window.open(bing, "_blank");
                    break;
                case 'yandex':
                    window.open(yandex, "_blank");
                    break;
            }
        }

        function uploadImage() {
            const file = document.getElementById('input_img'),
                data = new FormData();

            data.append("auth_token", "<?php echo IMGBB_API_KEY?>");
            data.append("action", "upload");
            data.append("source", file.files[0]);
            data.append("type", "file");
            data.append("expiration", "PT5M");
            data.append("timestamp", Date.now().toString());

            const settings = {
                "url": "https://imgbb.com/json",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": data
            };

            $.ajax(settings).done(function (response) {
                // console.log(response);
                let jx = JSON.parse(response),
                    imageUrl = jx['image']['url'], // console.log(jx['image']['url']);
                    google = 'https://lens.google.com/uploadbyurl?url=' + imageUrl,
                    bing = 'https://www.bing.com/images/search?view=detailv2&iss=sbi&form=SBIIRP&sbisrc=UrlPaste&q=imgurl:' + imageUrl,
                    yandex = 'https://yandex.com/images/search?source=collections&rpt=imageview&url=' + imageUrl;

                $('#google').empty();
                $('#bing').empty();
                $('#yandex').empty();

                $('#google').prepend('<a class="link" href="' + google + '" target="_blank"><img src="assets/images/icons/google.png" alt="google" width="90" height="90" style="float: left;"><p>Similar Images according to Google</p></a>');
                $('#bing').prepend('<a class="link" href="' + bing + '" target="_blank"><img src="assets/images/icons/bing.png" alt="bing.png" width="90" height="90" style="float: left;"><p>Similar Images according to Bing</p></a>');
                $('#yandex').prepend('<a class="link" href="' + yandex + '" target="_blank"><img src="assets/images/icons/yandex.png" alt="yandex" width="90" height="90" style="float: left;"><p>Similar Images according to Yandex</p></a>');
            });
        }

        $(document).ajaxStart(function () {
            $('#loadingImg').show();
        })

        $(document).ajaxStop(function () {
            $('#loadingImg').hide();
        })
    </script>

<?php
echo $pageDescription;

$form = new Form('POST', 'my-form-preventDefault', 'inputForm');
$form->input('input', 'Enter Image URL:', 'text', array('placeholder' => 'Enter Image URL', 'class' => 'input-url'));
$form->html('<b>Search Similar Images in:</b><br>');
$form->button('action', 'search', 'Google', array('class' => 'button', 'onclick' => "doReverseSearch('google')"));
$form->button('action', 'search', 'Bing', array('class' => 'button', 'onclick' => "doReverseSearch('bing')"));
$form->button('action', 'search', 'Yandex', array('class' => 'button', 'onclick' => "doReverseSearch('yandex')"));
echo $form->render();
?>
    <header class="separator marginT20 marginB20"></header>

    <p>Or Select image from your computer ></p>
    <div class="upload_area">
        <label class="form-label" for="file">Choose an image to upload:</label>
        <input type="file" name="file" id="input_img" onchange="uploadImage()" accept="image/*">
    </div>

    <br><br>
    <div class="result-container">
        <div id="loadingImg" class="loading-indicator" style="display:none;">
            <svg width="80" height="80" viewBox="0 0 24 24" fill="#A6A7AB" xmlns="http://www.w3.org/2000/svg">
                <path d="M12,23a9.63,9.63,0,0,1-8-9.5,9.51,9.51,0,0,1,6.79-9.1A1.66,1.66,0,0,0,12,2.81h0a1.67,1.67,0,0,0-1.94-1.64A11,11,0,0,0,12,23Z">
                    <animateTransform attributeName="transform" type="rotate" calcMode="linear" dur="0.75s"
                                      values="0 12 12;360 12 12" repeatCount="indefinite"></animateTransform>
                </path>
            </svg>
        </div>

        <div class="section">
            <div id="google" class="section-flex-box"></div>
            <div id="bing" class="section-flex-box"></div>
            <div id="yandex" class="section-flex-box"></div>
        </div>
    </div>
    <script src="assets/js/custom-file-input.js"></script>
    <link href="assets/css/custom-file-input.css" rel="stylesheet" type="text/css">

<?php
include '../app/includes/footer.php'; ?>