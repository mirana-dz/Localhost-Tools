<?php

// Error reporting setting
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('BASE_PATH', __DIR__);
// Site settings
define('SITE_NAME', 'MIRANA-DZ LOCALHOST TOOLS');
//define('SITE_URL', 'http://localhost/Localhost-Tools');
define('OUTPUT_DIR', BASE_PATH . '/outputs');
define('UPLOAD_DIR', BASE_PATH . '/uploads');
// API KEY
define('OPENAI_API_KEY', 'YOUR API KEY');
define('IMGBB_API_KEY', '3562ece80429b257452186d68be77d5ba6340a5d');
define('IMGUR_API_KEY', '35ac59e22bb084643ec26d0d179365f7ad9e2c5d');

// Autoload classes using Composer's PSR-4 autoloader
require_once BASE_PATH . '/../vendor/autoload.php';

// Importing Routing class
require_once BASE_PATH . '/../app/Core/Router.php';

// Importing necessary files for the program
require_once BASE_PATH . '/../app/Core/GridMenu.php';
require_once BASE_PATH . '/../app/Core/Form.php';
require_once BASE_PATH . '/../app/Helpers/helpers.php';

// Define the routes
$routes = [
    'index' => '\App\Controllers\BasicController@home',
    'about' => '\App\Controllers\AboutController@index',
    // 1- Encoding/Decoding Tools
    'base64_encoder_decoder' => '\App\Controllers\EncoderDecoderController@base64',
    'url_encoder_decoder' => '\App\Controllers\EncoderDecoderController@url',
    'uu_encoder_decoder' => '\App\Controllers\EncoderDecoderController@uu',
    'rot13_encoder_decoder' => '\App\Controllers\EncoderDecoderController@rot13',
    'punycode_encoder_decoder' => '\App\Controllers\EncoderDecoderController@punycode',
    'hex_encoder_decoder' => '\App\Controllers\EncoderDecoderController@hex',
    'bin_encoder_decoder' => '\App\Controllers\EncoderDecoderController@bin',
    'torrent_decoder' => '\App\Controllers\TorrentDecoderController@index',
    // 2- Cryptography Tools
    'message_digest' => '\App\Controllers\MessageDigestController@index',
    'hash_generator' => '\App\Controllers\HashGeneratorController@index',
    'hmac_generator' => '\App\Controllers\HmacGeneratorController@index',
    'crc32_generator' => '\App\Controllers\Crc32GeneratorController@index',
    'password_generator' => '\App\Controllers\BasicController@passwordGenerator',
    'cisco_type_7' => '\App\Controllers\CiscoType7Controller@index',
    'joomla_password_generator' => '\App\Controllers\JoomlaPasswordController@index',
    'vb_Password_generator' => '\App\Controllers\VbPasswordController@index',
    'drupal_password_generator' => '\App\Controllers\DrupalPasswordController@index',
    'htPasswd_generator' => '\App\Controllers\HtpasswdGeneratorController@index',
    'caesar_cipher' => '\App\Controllers\CaesarCipherController@index',
    'reverse_hash_lookup' => '\App\Controllers\ReverseHashLookupController@index',
    // 3- Web Development Tools
    'html_minifier' => '\App\Controllers\HtmlMinifierController@index',
    'html_obfuscator' => '\App\Controllers\HtmlObfuscatorController@index',
    'html_escape_unescape' => '\App\Controllers\HtmlEscapeController@index',
    'email_obfuscator' => '\App\Controllers\EmailObfuscatorController@index',
    'js_minifier' => '\App\Controllers\JsMinifierController@index',
    'css_minifier' => '\App\Controllers\CssMinifierController@index',
    'css_text_shadow' => '\App\Controllers\BasicController@cssTextShadow',
    'php_obfuscator_1' => '\App\Controllers\PhpObfuscator1Controller@index',
    // 4- Images Tools
    'base64_image' => '\App\Controllers\Base64ImageController@index',
    'images_converter' => '\App\Controllers\ImagesConverterController@index',
    'image_resizer' => '\App\Controllers\BasicController@imageResizer',
    'image_color_picker' => '\App\Controllers\BasicController@imageColorPicker',
    'share_images' => '\App\Controllers\ShareImagesController@index',
    // 5- Network Tools
    'ip_address_converter' => '\App\Controllers\IpAddressConverterController@index',
    'http_header_status_checker' => '\App\Controllers\HttpHeaderStatusCheckerController@index',
    'ping_tool' => '\App\Controllers\PingToolController@index',
    'ports_list' => '\App\Controllers\PortsListController@index',
    'ip_geolocation' => '\App\Controllers\IpGeolocationController@index',
    'whois_lookup' => '\App\Controllers\WhoisLookupController@index',
    'subdomain_finder' => '\App\Controllers\SubdomainFinderController@index',
    // 6- Pentesting Tools
    'admin_finder' => '\App\Controllers\AdminFinderController@index',
    'zip_path_traversal' => '\App\Controllers\ZipPathTraversalController@index',
    'website_malware_checker' => '\App\Controllers\BasicController@websiteMalwareChecker',
    'google_dorking' => '\App\Controllers\BasicController@googleDorking',
    'default_router_settings' => '\App\Controllers\DefaultRouterSettingsController@index',
    'default_credentials' => '\App\Controllers\DefaultCredentialsController@index',
    // 7- OSINT Tools
    'search_engines' => '\App\Controllers\BasicController@searchEngines',
    'reverse_image_search' => '\App\Controllers\BasicController@reverseImageSearch',
    'images_search' => '\App\Controllers\BasicController@imagesSearch',
    'video_search' => '\App\Controllers\BasicController@videoSearch',
    'torrent_search' => '\App\Controllers\TorrentSearchController@index',
    'cached_pages' => '\App\Controllers\BasicController@cachedPages',
    'search_phone_number' => '\App\Controllers\BasicController@searchPhoneNumber',
    // 8- AI Tools
    'email_generator' => '\App\Controllers\EmailGeneratorController@index',
    'english_teacher' => '\App\Controllers\EnglishTeacherController@index',
    'translator' => '\App\Controllers\TranslatorController@index',
    // 9- Miscellaneous Tools
    'my_bookmarks' => '\App\Controllers\BasicController@myBookmarks',
    'bat_obfuscator' => '\App\Controllers\BatObfuscatorController@index',
    'lists_and_tables' => '\App\Controllers\BasicController@listsAndTables',
];