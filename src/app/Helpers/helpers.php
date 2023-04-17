<?php

function redirect($url)
{
    header('Location: ' . $url);
    exit();
}

function e($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function generateRandomString($length = 10): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

function stringToHex($string): string
{
    $hexString = '';

    for ($i = 0; $i < strlen($string); $i++) {
        $hexString .= '%' . bin2hex($string[$i]);
    }

    return $hexString;
}

function getCurrentPage(): string
{
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function httpsGetRequest($url)
{
    $curl = curl_init();
    if (!$curl) {
        die("Couldn't initialize a cURL handle");
    }

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => '',
        CURLOPT_HTTPHEADER => [
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0'
        ],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);

    if ($err) {
        die('cURL Error #:' . $err);
    }

    curl_close($curl);

    return $response;
}

function httpsPostRequest($url, $postFields = NULL)
{
    $curl = curl_init();
    if (!$curl) {
        die("Couldn't initialize a cURL handle");
    }

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $postFields,
        CURLOPT_HTTPHEADER => [
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0'
        ],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);

    if ($err) {
        die('cURL Error #:' . $err);
    }

    curl_close($curl);

    return $response;
}

function getHTTPCode($url, $followRedirects = false)
{
    $curl = curl_init();
    if (!$curl) {
        die("Couldn't initialize a cURL handle");
    }

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_FOLLOWLOCATION => $followRedirects,
        CURLOPT_HEADER => true,
        CURLOPT_NOBODY => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS => '',
        CURLOPT_HTTPHEADER => [
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0'
        ],
    ]);
    curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $err = curl_error($curl);

    if ($err) {
        die('cURL Error #:' . $err);
    }

    curl_close($curl);

    return $httpCode;
}

function readableFileSize($bytes, $dec = 2): array|string
{
    $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $factor = floor((strlen($bytes) - 1) / 3);

    $result = sprintf("%.{$dec}f ", $bytes / pow(1024, $factor)) . @$size[$factor];
    return str_replace('.', ',', $result);
}

function utf8Encode($data)
{
    return match (gettype($data)) {
        'array' => utf8EncodeArray($data),
        'string' => utf8_encode($data),
    };
}

function utf8EncodeArray($array)
{
    foreach ($array as $key => $value) {
        $array[$key] = utf8Encode($value);
    }
    return $array;
}