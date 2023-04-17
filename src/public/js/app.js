$(document).ready(function () {

    // Copy textarea text to clipboard
    $('#copy-btn').click(function () {
        $('#result-display').select();
        document.execCommand("copy");
        alert("Text copied to clipboard!");
    });

    // Download textarea text as a file
    $('#download-btn').click(function () {
        var text = $('#result-display').val();
        var filename = "result.txt";
        var blob = new Blob([text], {type: "text/plain;charset=utf-8"});
        saveAs(blob, filename);
    });

    $(".button").click(function () {
        $(this).blur();
    });

    //Nav tabs
    $("#tab-1").prop('checked', 'true');
    $("input[type='radio'][name=css-tabs]").click(function () {
        const id = $(this).attr("id");
        $(".pane div").hide();
        $("#" + id + 'Div').show();
        $("#" + id + 'Div div').show();
    });
    /*
        // Cache jQuery selectors
        const $cssTabs = $("input[type='radio'][name=css-tabs]");
        const $paneDiv = $(".pane div");

        // Select the first tab by default
        $("#tab-1").prop('checked', true);

        // Bind a click event to the parent element that contains all radio buttons
        $(".tabs").on("click", "input[type='radio'][name='css-tabs']", function () {
            const id = $(this).attr("id");

            // Hide all the pane div elements and show the selected one
            $paneDiv.hide();
            $("#" + id + "Div").show();
        });
    */
    $('button[type="submit"]').on('click', function () {
        $('button[type="submit"]').removeAttr('clicked');
        $(this).attr('clicked', "true");
    });


    $('#my-form-preventDefault').on('submit', function (e) {
        e.preventDefault();
    });


    $('#my-form').on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid()) {

            var formData;
            var submitValue = $('button[type="submit"][clicked=true]').val();

            formData = $(this).serialize() + '&action=' + submitValue;

            var $resultDisplay = $('#result-display');
            $resultDisplay.html('Loading');

            var dots = 0;
            var loadingInterval = setInterval(function () {
                dots = (dots + 1) % 4;
                var dotsStr = '.'.repeat(dots);
                $resultDisplay.html('Loading' + dotsStr);
            }, 500);

            $.ajax({
                // url: #, // Replace with your controller file name
                type: 'POST',
                data: formData,
                success: function (response) {
                    clearInterval(loadingInterval);
                    if ($('#result-display').is('input')) {
                        $('#result-display').val(response);
                    } else if ($('#result-display').is('div')) {
                        $('#result-display').html(response);
                    } else if ($('#result-display').is('textarea')) {
                        $('#result-display').val(response);
                    }
                }
            });
        }
    });

    $('#my-form-file').on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            var formData;

            formData = new FormData(this);

            $.ajax({
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if ($('#result-display').is('input')) {
                        $('#result-display').val(response);
                    } else if ($('#result-display').is('div')) {
                        $('#result-display').html(response);
                    } else if ($('#result-display').is('textarea')) {
                        $('#result-display').val(response);
                    }
                }
            });
        }
    });

    $('#my-form-2split').on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid()) {

            $.ajax({
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    // Split the response into two variables
                    var response1 = response.split('<!--SPLIT-->')[0];
                    var response2 = response.split('<!--SPLIT-->')[1];
                    // Update the HTML of the two divs with the response variables
                    $('#result-display').val(response1);
                    $('#result-display1').val(response2);
                }
            });
        }
    });

});

function http_redirect(url) {
    return location.replace(url);
}