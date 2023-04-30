<?php

namespace App\Controllers;

class BatObfuscatorController
{
    public function index(): void
    {

        $pageTitle = 'Bat Obfuscator';
        $pageCategory = 'Miscellaneous Tools';
        $pageDescription = '<p>Batch script obfuscation is a tool used by developers to protect their scripts from unauthorized access. It converts batch script code into an obfuscated form that is difficult to understand or modify. This tool helps developers safeguard their batch scripts from unauthorized users.</p>';

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/bat_obfuscator.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');

        if (empty($input)) {
            echo 'Invalid input.';
            return;
        }

        echo $this->batObfuscator($input);
    }

    private function batObfuscator($batCode): string
    {
        $varName = '$' . generateRandomString(5);
        $characters = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        shuffle($characters);

        $varContent = implode('', $characters);

        $set = 'set ' . $varName . '=' . $varContent;
        $length = strlen($batCode);
        $codeObfuscated = '';

        for ($i = 0; $i <= $length - 1; ++$i) {
            $position = strpos($varContent, $batCode[$i]);

            if ($position !== false) {
                $codeObfuscated .= '%' . $varName . ':~' . $position . ',1%';
            } else {
                $codeObfuscated .= $batCode[$i];
            }
        }

        return "@echo off\n$set\ncls\n$codeObfuscated";
    }
}