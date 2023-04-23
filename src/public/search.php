<?php

$searchInput = filter_input(INPUT_POST, 'search_boxVal') ?? '';

$searchData = array();
// Encoding/Decoding Tools
$searchData[] = array('id' => 'Base64 Encoder', 'url' => '?route=base64_encoder_decoder');
$searchData[] = array('id' => 'Base64 Decoder', 'url' => '?route=base64_encoder_decoder');
$searchData[] = array('id' => 'Base32 Encoder', 'url' => '?route=base64_encoder_decoder');
$searchData[] = array('id' => 'Base32 Decoder', 'url' => '?route=base64_encoder_decoder');
$searchData[] = array('id' => 'URL Encoder', 'url' => '?route=url_encoder_decoder');
$searchData[] = array('id' => 'URL Decoder', 'url' => '?route=url_encoder_decoder');
$searchData[] = array('id' => 'UU Encoder', 'url' => '?route=uu_encoder_decoder');
$searchData[] = array('id' => 'UU Decoder', 'url' => '?route=uu_encoder_decoder');
$searchData[] = array('id' => 'ROT13 Encoder', 'url' => '?route=rot13_encoder_decoder');
$searchData[] = array('id' => 'ROT13 Decoder', 'url' => '?route=rot13_encoder_decoder');
$searchData[] = array('id' => 'Punycode Encoder', 'url' => '?route=punycode_encoder_decoder');
$searchData[] = array('id' => 'Punycode Decoder', 'url' => '?route=punycode_encoder_decoder');
$searchData[] = array('id' => 'Hex Encoder', 'url' => '?route=hex_encoder_decoder');
$searchData[] = array('id' => 'Hex Decoder', 'url' => '?route=hex_encoder_decoder');
$searchData[] = array('id' => 'Bin Encoder', 'url' => '?route=bin_encoder_decoder');
$searchData[] = array('id' => 'Bin Decoder', 'url' => '?route=bin_encoder_decoder');
$searchData[] = array('id' => 'Torrent decoder', 'url' => '?route=torrent_decoder');
// Cryptography Tools
$searchData[] = array('id' => 'Message Digest - MD2', 'url' => '?route=message_digest');
$searchData[] = array('id' => 'Message Digest - MD4', 'url' => '?route=message_digest');
$searchData[] = array('id' => 'Message Digest - MD5', 'url' => '?route=message_digest');
$searchData[] = array('id' => 'Message Digest - MD6', 'url' => '?route=message_digest');
$searchData[] = array('id' => 'Message Digest - SHA1', 'url' => '?route=message_digest');
$searchData[] = array('id' => 'Message Digest - SHA224', 'url' => '?route=message_digest');
$searchData[] = array('id' => 'Message Digest - SHA256', 'url' => '?route=message_digest');
$searchData[] = array('id' => 'Message Digest - SHA384', 'url' => '?route=message_digest');
$searchData[] = array('id' => 'Message Digest - SHA512', 'url' => '?route=message_digest');
$searchData[] = array('id' => 'Hash Generator', 'url' => '?route=hash_generator');
$searchData[] = array('id' => 'HMAC Generator', 'url' => '?route=hmac_generator');
$searchData[] = array('id' => 'CRC32 Generator', 'url' => '?route=crc32_generator');
$searchData[] = array('id' => 'CRC32B Generator', 'url' => '?route=crc32_generator');
$searchData[] = array('id' => 'CRC32C Generator', 'url' => '?route=crc32_generator');
$searchData[] = array('id' => 'Password Generator', 'url' => '?route=password_generator');
$searchData[] = array('id' => 'Cisco Type 7 Password Encrypt', 'url' => '?route=cisco_type_7');
$searchData[] = array('id' => 'Cisco Type 7 Password Decrypt', 'url' => '?route=cisco_type_7');
$searchData[] = array('id' => 'Joomla Password Generator', 'url' => '?route=joomla_password_generator');
$searchData[] = array('id' => 'Vb Password Generator', 'url' => '?route=vb_Password_generator');
$searchData[] = array('id' => 'Drupal Password Generator', 'url' => '?route=drupal_password_generator');
$searchData[] = array('id' => 'Htpasswd Generator', 'url' => '?route=htPasswd_generator');
$searchData[] = array('id' => 'Reverse Hash Lookup', 'url' => '?route=reverse_hash_lookup');
// Web Development Tools
$searchData[] = array('id' => 'HTML Minifier', 'url' => '?route=html_minifier');
$searchData[] = array('id' => 'HTML Obfuscator', 'url' => '?route=html_obfuscator');
$searchData[] = array('id' => 'HTML Escape', 'url' => '?route=html_escape_unescape');
$searchData[] = array('id' => 'HTML Unescape', 'url' => '?route=html_escape_unescape');
$searchData[] = array('id' => 'EMAIL Obfuscator', 'url' => '?route=email_obfuscator');

$searchData[] = array('id' => 'CSS Minifier', 'url' => '?route=css_minifier');
$searchData[] = array('id' => 'CSS Text Shadow', 'url' => '?route=css_text_shadow');

$searchData[] = array('id' => 'PHP Obfuscator 1', 'url' => '?route=php_obfuscator_1');
// Images Tools
$searchData[] = array('id' => 'Image to Base64', 'url' => '?route=base64_image');
$searchData[] = array('id' => 'Base64 to image', 'url' => '?route=base64_image');
$searchData[] = array('id' => 'Images Converter', 'url' => '?route=images_converter');
$searchData[] = array('id' => 'Png, Jpeg, Gif, Bmp Converter', 'url' => '?route=images_converter');
$searchData[] = array('id' => 'Image Resizer', 'url' => '?route=image_resizer');
$searchData[] = array('id' => 'Image Color Picker', 'url' => '?route=image_color_picker');
$searchData[] = array('id' => 'Share Images', 'url' => '?route=share_images');
$searchData[] = array('id' => 'imgur Image uploader', 'url' => '?route=share_images');
// Network Tools
$searchData[] = array('id' => 'IP Address Converter', 'url' => '?route=ip_address_converter');
$searchData[] = array('id' => 'HTTP Header Status Checker', 'url' => '?route=http_header_status_checker');
$searchData[] = array('id' => 'Ping Tool', 'url' => '?route=ping_tool');
$searchData[] = array('id' => 'Ports List', 'url' => '?route=ports_list');
$searchData[] = array('id' => 'IP Geolocation', 'url' => '?route=ip_geolocation');
$searchData[] = array('id' => 'Whois Lookup', 'url' => '?route=whois_lookup');
$searchData[] = array('id' => 'Subdomain Finder', 'url' => '?route=subdomain_finder');
// Pentesting
$searchData[] = array('id' => 'Admin Finder', 'url' => '?route=admin_finder');
$searchData[] = array('id' => 'Zip Path Traversal', 'url' => '?route=zip_path_traversal');
$searchData[] = array('id' => 'Website Malware Checker', 'url' => '?route=website_malware_checker');
$searchData[] = array('id' => 'Google Dorking', 'url' => '?route=google_dorking');
$searchData[] = array('id' => 'Default Router Settings', 'url' => '?route=default_router_settings');
$searchData[] = array('id' => 'Default Credentials', 'url' => '?route=default_credentials');
// OSINT Tools
$searchData[] = array('id' => 'Search Engines', 'url' => '?route=search_engines');
$searchData[] = array('id' => 'Reverse Image Search', 'url' => '?route=reverse_image_search');
$searchData[] = array('id' => 'Images Search', 'url' => '?route=images_search');
$searchData[] = array('id' => 'Video Search', 'url' => '?route=video_search');
$searchData[] = array('id' => 'Cached Pages', 'url' => '?route=cached_pages');
$searchData[] = array('id' => 'Torrent Search', 'url' => '?route=torrent_search');
$searchData[] = array('id' => 'Search phone number', 'url' => '?route=search_phone_number');
// AI Tools
$searchData[] = array('id' => 'Email Generator', 'url' => '?route=email_generator');
$searchData[] = array('id' => 'English Teacher', 'url' => '?route=english_teacher');
$searchData[] = array('id' => 'Translator', 'url' => '?route=translator');
//Miscellaneous Tools
$searchData[] = array('id' => 'My Bookmarks', 'url' => '?route=my_bookmarks');
$searchData[] = array('id' => 'Bat obfuscator', 'url' => '?route=bat_obfuscator');
$searchData[] = array('id' => 'Lists and Tables', 'url' => '?route=lists_and_tables');
//---Lists and Tables 
$searchData[] = array('id' => 'HTML Codes - ASCII Special Characters', 'url' => '?route=lists_and_tables&Goto=ascii_special_characters');
$searchData[] = array('id' => 'Color Tables', 'url' => '?route=lists_and_tables&Goto=color_tables');
$searchData[] = array('id' => 'Time Zones', 'url' => '?route=lists_and_tables&Goto=time_zones');
$searchData[] = array('id' => 'Top-Level Domains (TLDs)', 'url' => '?route=lists_and_tables&Goto=top_level_domains');
$searchData[] = array('id' => 'Windows Version Numbers', 'url' => '?route=lists_and_tables&Goto=windows_version_numbers');
$searchData[] = array('id' => 'HTTP response status codes', 'url' => '?route=lists_and_tables&Goto=http_response_status_codes');
$searchData[] = array('id' => 'ISO Country List - HTML select/dropdown snippet', 'url' => '?route=lists_and_tables&Goto=iso_country_list');

if (!empty($searchInput) && strlen($searchInput) > 1) {
    foreach ($searchData as $menuItem) {
        if (preg_grep('/^.*' . $searchInput . '/i', $menuItem)) {
            $bodytag = str_ireplace($searchInput, '<strong>' . $searchInput . '</strong>', $menuItem['id']);
            echo '<a class="search-result" href="' . $menuItem['url'] . '">' . $bodytag . '</a>';
        }
    }
}