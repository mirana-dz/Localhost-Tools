<?php

use JetBrains\PhpStorm\NoReturn;

/**
 * Perform an HTTP redirect to the specified URL and stop script execution.
 *
 * @param string $url The URL to redirect to
 * @return void This function does not return anything
 * @throws AttributeError if called. The #[NoReturn] attribute indicates that
 * the function does not return normally under any circumstances.
 */
#[NoReturn] function redirect(string $url): void
{
    header('Location: ' . $url);
    exit();
}

/**
 * Convert special characters to HTML entities to prevent XSS attacks
 *
 * @param string $string The string to escape
 * @return string The escaped string
 */
function e(string $string): string
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Generate a random string of the specified length, composed of alphanumeric characters.
 *
 * @param int $length The length of the desired random string. Default value is 10.
 * @return string The randomly generated string
 */
function generateRandomString(int $length = 10): string
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

/**
 * Convert a given string to a hexadecimal representation
 *
 * @param string $string The string to convert
 * @return string The hexadecimal representation of the input string
 */
function stringToHex(string $string): string
{
    $hexString = '';

    for ($i = 0; $i < strlen($string); $i++) {
        $hexString .= '%' . bin2hex($string[$i]);
    }

    return $hexString;
}

/**
 * Get the current page URL
 *
 * @return string The current page URL
 */
function getCurrentPage(): string
{
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

/**
 * Performs an HTTPS GET request on the specified URL using cURL.
 *
 * @param string $url The URL to request.
 * @return string|bool The response from the requested URL.
 * @throws Exception If a cURL handle could not be initialized or an error occurs during the request.
 */
function httpsGetRequest(string $url): string|bool
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

/**
 * Sends an HTTP POST request to a specified URL using cURL.
 *
 * @param string $url The URL to which the request is sent.
 * @param array|string|null $postFields The data to be sent with the POST request. Default is null.
 * @return string|bool The response from the server.
 * @throws Exception If the cURL handle could not be initialized or if an error occurs during the request.
 */
function httpsPostRequest(string $url, array|string $postFields = NULL): string|bool
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

/** Deprecated
 * Gets the HTTP code of a given URL
 *
 * @param string $url The URL to request
 * @param bool $followRedirects Whether or not to follow redirects
 * @return int The HTTP status code of the response
 * @throws RuntimeException If cURL initialization fails or there's a cURL error
 */
/*
function getHTTPCode(string $url, bool $followRedirects = false): int
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
*/
/**
 * Convert a file size in bytes to a human-readable format.
 *
 * @param int $bytes The size of the file in bytes.
 * @param int $dec The number of decimal places to display. Default value is 2.
 * @return array|string An array or string containing the human-readable file size.
 */
function readableFileSize(int $bytes, int $dec = 2): array|string
{
    $size = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $factor = floor((strlen($bytes) - 1) / 3);

    $result = sprintf("%.{$dec}f ", $bytes / pow(1024, $factor)) . @$size[$factor];
    return str_replace('.', ',', $result);
}

/**
 * Encode data to UTF-8 format.
 *
 * @param mixed $data The data to be encoded.
 * @return string|array|bool The UTF-8 encoded data.
 */
function utf8Encode(mixed $data): string|array|bool
{
    return match (gettype($data)) {
        'array' => utf8EncodeArray($data),
        'string' => mb_convert_encoding($data, "UTF-8"),  //deprecated: utf8_encode($data)
    };
}

/**
 * Recursively encode an array to UTF-8 format.
 *
 * @param array $array The array to be encoded.
 * @return array The UTF-8 encoded array.
 */
function utf8EncodeArray(array $array): array
{
    foreach ($array as $key => $value) {
        $array[$key] = utf8Encode($value);
    }
    return $array;
}

/**
 * Determines whether a string is encoded using Base32.
 * Base32 uses characters A-Z and 2-7 for encoding and adds a padding character "=" to get a multiple of 8 characters.
 *
 * @param string $str The string to check for Base32 encoding.
 * @return bool Returns true if the input string is encoded using Base32, and false otherwise.
 */
function is_base32($str)
{
    // A-Z and 2-7 repeated, with optional `=` at the end
    $b32_regex = '/^[A-Z2-7]+=*$/';

    if (strlen($str) % 8 === 0 &&
        preg_match($b32_regex, $str)) {
        return true;
    } else {
        return false;
    }
}