//Wait for the DOM to be ready
$(function () {

    $.validator.addMethod("md5", function (value, element) {
        return this.optional(element) || /^[a-f0-9]{32}$/.test(value);
    }, "Invalid hash format.");

    //Initialize form validation on the registration form.
    $("form[name='inputForm']").validate({
        //Specify validation rules
        rules: {
            input: "required",
        },

        //Specify validation error messages
        messages: {
            input: "Please enter the input string",
        },
    });

    // ?route=email_obfuscator
    $("form[name='email-obfuscator']").validate({
        rules: {
            input: {
                required: true,
                email: true
            },
            email_title: "required"
        },

        messages: {
            input: {
                required: "Please enter the input string",
                email: "Please enter a valid Email"
            },
            email_title: "Please enter the email title"
        },
    });

    // ?route=zip_path_traversal
    $("form[name='zip-path-traversal']").validate({
        rules: {
            input: "required",
            file_name: "required"
        },

        messages: {
            input: "Please enter the input string",
            file_name: "Please enter the path & file name (Ex: ../../../index.php)"
        },
    });

    // ?route=admin_finder
    $("form[name='admin-finder']").validate({
        rules: {
            url: {
                required: true,
                url2: true
            },
        },

        messages: {
            url: {
                required: "Please enter the input string",
                url2: "Please enter a valid URL"
            },
        },
    });

    // ?route=torrent_decoder
    $("form[name='torrent-decoder']").validate({
        errorContainer: "#validate-error",
        errorLabelContainer: "#validate-error",
        rules: {
            torrent_file: {
                required: true,
                extension: "torrent"
            },
        },

        messages: {
            torrent_file: {
                required: "Please enter the input file",
                extension: "Please select valid input file format *.torrent"
            },
        },
    });

    // 
    $("form[name='image-upload']").validate({
        errorContainer: "#validate-error",
        errorLabelContainer: "#validate-error",
        rules: {
            file: {
                required: true,
                extension: "jpg|jpeg|png|gif|webp|svg|bmp"
            },
        },

        messages: {
            file: {
                required: "Please enter the input file",
                extension: "Please select valid input file format *.jpg|jpeg|png|gif|webp|svg|bmp"
            },
        },
    });

    // ?route=subdomain_finder
    $("form[name='form-flex']").validate({
        errorContainer: "#validate-error",
        errorLabelContainer: "#validate-error",
        rules: {
            input: {
                required: true
            },
        },

        messages: {
            input: {
                required: "Please enter the input string"
            },
        },
    });

    // ?route=htPasswd_generator
    $("form[name='htPasswd']").validate({
        rules: {
            username: "required",
            password: "required",
        },

        messages: {
            username: "Please enter the username",
            password: "Please enter the password",
        },
    });

});