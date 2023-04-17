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
                color: #000;
                text-decoration: none;
                padding: 10px;
            }

            a.link:hover {
                background-color: #3b3b3b;
            }
        </style>
		
    <script>
        function doReverseSearch() {
            if ($("form").valid()) {
                reverseSearchFunction();
            }
        }

        function reverseSearchFunction() {
            const image_url = document.getElementsByTagName('input')[0].value,
                search_engine = document.getElementsByTagName('select')[0].value;
            let google = 'https://lens.google.com/uploadbyurl?url=' + image_url,
                //google = 'https://www.google.com/searchbyimage?&image_url=' + image_url, // deprecated
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
                    //google = 'https://www.google.com/searchbyimage?&image_url=' + imageUrl, // deprecated
					google = 'https://lens.google.com/uploadbyurl?url=' + imageUrl,
                    bing = 'https://www.bing.com/images/search?view=detailv2&iss=sbi&form=SBIIRP&sbisrc=UrlPaste&q=imgurl:' + imageUrl,
                    yandex = 'https://yandex.com/images/search?source=collections&rpt=imageview&url=' + imageUrl;

                $('#google').prepend('<a class="link" href="' + google + '" target="_blank"><img src="images/icons/google.png" alt="google" width="90" height="90" style="float: left;"><p>Similar Images according to Google</p></a>');
                $('#bing').prepend('<a class="link" href="' + bing + '" target="_blank"><img src="images/icons/bing.png" alt="bing.png" width="90" height="90" style="float: left;"><p>Similar Images according to Bing</p></a>');
                $('#yandex').prepend('<a class="link" href="' + yandex + '" target="_blank"><img src="images/icons/yandex.png" alt="yandex" width="90" height="90" style="float: left;"><p>Similar Images according to Yandex</p></a>');
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
$form->input('input', 'Enter Image URL:', 'text');
$form->select('option', 'Select Search Engine:', array(
    'google' => 'google.com',
    'bing' => 'bing.com',
    'yandex' => 'yandex.com'
), 'google');
$form->button('action', 'search', 'Search Similar Images', array('class' => 'button', 'onclick' => 'doReverseSearch()'));
echo $form->render();
?>

    <p>Or Select image from your computer ></p>
    <div class="upload_area">
        <label class="field-label block" for="file">Choose an image to upload</label>
        <input type="file" name="file" id="input_img" onchange="uploadImage()" accept="image/*">
    </div>
    <img id="loadingImg" src="images/loading.gif" class="center" alt="" width="287" height="141"
         style="display:none;">
    <div class="section">
        <div id="google" class="section-flex-box"></div>
        <div id="bing" class="section-flex-box"></div>
        <div id="yandex" class="section-flex-box"></div>
    </div>

    <script src="js/custom-file-input.js"></script>
    <link href="css/custom-file-input.css" rel="stylesheet" type="text/css">

<?php
include '../app/includes/footer.php'; ?>