<?php

namespace App\Helpers;

class CiscoDecrypt
{
	
/*
Cisco VPN Client Password Decoder
$pwd = 'A39CADD77ED72A9C75467D0F5A5C88BFCD75370DD63E3388D3F402AF50C4E5029071B0965C343B99B6D6636A8698562DDB2EE51020D87EA3'
return "HelloWorld" as the password
*/
    public static function decryptVpnPassword($pwd)
    {
        $pwd = CiscoDecrypt::preprocessInput($pwd);
        if ($pwd == '') {
            return '';
        }

        $binPwd = CiscoDecrypt::base16decode($pwd);
        $desKey = CiscoDecrypt::calc_3des_key($binPwd);
        $iv = substr($binPwd, 0, 8);
        $encrypted = substr($binPwd, 40);
        $decrypted = openssl_decrypt($encrypted, 'des-ede3-cbc', $desKey, OPENSSL_RAW_DATA, $iv);

        return rtrim($decrypted, "\0");
    }

    public static function preprocessInput($str)
    {
        $str = trim($str);

        if (substr($str, 0, 13) == 'enc_GroupPwd=') {
            $str = substr($str, 13);
        }

        $str = trim($str);

        if (substr($str, 0, 1) == "'" || substr($str, 0, 1) == '"') {
            $str = substr($str, 1);
        }

        if (substr($str, -1) == "'" || substr($str, -1) == '"') {
            $str = substr($str, 0, -1);
        }

        $str = trim($str);

        if (preg_match('/^([A-Fa-f0-9]{2})+$/', $str)) {
            return $str;
        }

        return '';
    }

    public static function base16decode($str)
    {
        return hex2bin($str);
    }

    public static function calc_3des_key($origHash)
    {
        $hashV1 = hash('sha1', CiscoDecrypt::get_temp_hash($origHash, 1), true);
        $hashV2 = hash('sha1', CiscoDecrypt::get_temp_hash($origHash, 3), true);
        return $hashV1 . substr($hashV2, 0, 4);
    }

    public static function get_temp_hash($origHash, $offset)
    {
        return substr($origHash, 0, 19) . chr(ord(substr($origHash, 19, 1)) + $offset);
    }


    // encrypt_cisco_type_7
    public static function encrypt_cisco_type_7($password)
    {
        $key = 4; // Encryption key for Cisco Type 7

        $password = str_split($password);

        foreach ($password as $char) {
            $output[] = ord($char) ^ $key;
            $key = $output[count($output) - 1];
        }

        $output = implode('', array_map('chr', $output));
        $output = base64_encode($output);

        return '7 ' . $output;
    }

    public static function decrypt_cisco_type_7($password)
    {
        $password = substr($password, 2); // Remove the '7 ' prefix
        $password = base64_decode($password);

        $key = 4; // Encryption key for Cisco Type 7

        $password = str_split($password);

        foreach ($password as $char) {
            $output[] = ord($char) ^ $key;
            $key = ord($char);
        }
        if (isset($output)) {
            $output = implode('', array_map('chr', $output));
            return $output;
        } else {
            //TODO
            return 'This one is NOT cisco type 7';
        }
    }
}