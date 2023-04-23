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

    $('button[type="submit"]').on('click', function () {
        $('button[type="submit"]').removeAttr('clicked');
        $(this).attr('clicked', "true");
    });


    $('#my-form-preventDefault').on('submit', function (e) {
        e.preventDefault();
    });

// Create the loading indicator as a jQuery object
    var $loadingIndicator = $('<div class="icon"><svg width="80" height="80" viewBox="0 0 24 24" fill="#A6A7AB" xmlns="http://www.w3.org/2000/svg"><path d="M12,23a9.63,9.63,0,0,1-8-9.5,9.51,9.51,0,0,1,6.79-9.1A1.66,1.66,0,0,0,12,2.81h0a1.67,1.67,0,0,0-1.94-1.64A11,11,0,0,0,12,23Z"><animateTransform attributeName="transform" type="rotate" calcMode="linear" dur="0.75s" values="0 12 12;360 12 12" repeatCount="indefinite"></animateTransform></path></svg></div>').addClass('loading-indicator');

// Function to show the loading indicator
    function showLoadingIndicator() {
	var $resultDisplay = $('#result-display');
        $resultDisplay.parent().append($loadingIndicator); // Append the loading indicator to the textarea's parent element
    }

// Function to hide the loading indicator
    function hideLoadingIndicator() {
        $loadingIndicator.remove(); // Remove the loading indicator from the DOM
    }

    $('#my-form').on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid()) {

            var formData;
            var submitValue = $('button[type="submit"][clicked=true]').val();

            formData = $(this).serialize() + '&action=' + submitValue;
            showLoadingIndicator();

            $.ajax({
                type: 'POST',
                data: formData,
                success: function (response) {
                    hideLoadingIndicator();
                    //  clearInterval(loadingInterval);
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
            showLoadingIndicator();
            $.ajax({
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    hideLoadingIndicator();
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

    // ?route=http_header_status_checker
    // ?route=vb_Password_generator
    $('#my-form-2split').on('submit', function (e) {
        e.preventDefault();
        if ($(this).valid()) {
            showLoadingIndicator();
            $.ajax({
                type: 'POST',
                data: $(this).serialize(),
                success: function (response) {
                    hideLoadingIndicator();
                    // Split the response into two variables
                    var response1 = response.split('<!--SPLIT-->')[0];
                    var response2 = response.split('<!--SPLIT-->')[1];
                    // Update the HTML of the two divs with the response variables
                    $('#result-display1').val(response1);
                    $('#result-display').val(response2);
                }
            });
        }
    });

});

function http_redirect(url) {
    return location.replace(url);
}