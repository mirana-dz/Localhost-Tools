<?php

namespace App\Controllers;

class EmailObfuscatorController
{
    public function index()
    {

        $pageTitle = 'EMAIL Obfuscator';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>This tool obfuscates email addresses in HTML pages to protect them from being harvested by spammers or other unauthorized users. It\'s an essential tool for web developers who want to safeguard their website\'s email addresses.</p>';

        $input = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();

            $emailTitle = $_POST['email_title'];
            $emailSeparated = explode('@', $input);

            switch ($_POST['method']) {
                case 'javascript':
                    $jsScript = '<script>
    <!--
    let title = "' . $emailTitle . '";
    let email = "' . $emailSeparated[0] . '";
    let emailHost = "' . $emailSeparated[1] . '";
    document.write("<a href=" + "mail" + "to:" + email + "@" + emailHost+ ">" + title + "</a>");
    //-->
</script>';
                    echo $jsScript;
                    break;
                case 'hex':
                    $email_obfuscated = stringToHex($input);
                    echo '<a href="mailto:' . $email_obfuscated . '">' . $emailTitle . '</a>';
                    break;
            }


            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/email_obfuscator.php');
    }
}