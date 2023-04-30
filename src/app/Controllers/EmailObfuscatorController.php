<?php

namespace App\Controllers;

class EmailObfuscatorController
{
    public function index(): void
    {

        $pageTitle = 'EMAIL Obfuscator';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>This tool obfuscates email addresses in HTML pages to protect them from being harvested by spammers or other unauthorized users. It\'s an essential tool for web developers who want to safeguard their website\'s email addresses.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/email_obfuscator.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $emailTitle = trim($_POST['email_title'] ?? '');
        $method = trim($_POST['method'] ?? '');

        if (empty($input) || empty($emailTitle) || empty($method)) {
            echo 'Invalid input.';
            return;
        }

        $emailTitle = $emailTitle;
        $emailSeparated = explode('@', $input);

        switch ($method) {
            case 'javascript':
                $jsScript = '<script>
    <!--
    let title = "' . $emailTitle . '";
    let email = "' . $emailSeparated[0] . '";
    let emailHost = "' . $emailSeparated[1] . '";
    document.write("<a href=" + "mail" + "to:" + email + "@" + emailHost+ ">" + title + "</a>");
    //-->
</script>';
                $result = $jsScript;
                break;
            case 'hex':
                $email_obfuscated = stringToHex($input);
                $result = '<a href="mailto:' . $email_obfuscated . '">' . $emailTitle . '</a>';
                break;
        }

        echo $result;
    }
}