<?php

//namespace App\Core;

class GridMenu
{

    /* private $menuItems;
      private $categories;*/

    private $menuItems = array(
        // 1- Encoder & Decoder
        array('label' => 'Base64 Encoder/Decoder', 'url' => '?route=base64_encoder_decoder', 'category' => 1, 'img_src' => 'images/icons/base64_encoder.png'),
        array('label' => 'URL Encoder/Decoder', 'url' => '?route=url_encoder_decoder', 'category' => 1, 'img_src' => 'images/icons/url_encoder.png'),
        array('label' => 'UU Encoder/Decoder', 'url' => '?route=uu_encoder_decoder', 'category' => 1, 'img_src' => 'images/icons/uu_encoder.png'),
        array('label' => 'Rot13 Encoder/Decoder', 'url' => '?route=rot13_encoder_decoder', 'category' => 1, 'img_src' => 'images/icons/rot13_encoder.png'),
        array('label' => 'Punycode Encoder/Decoder', 'url' => '?route=punycode_encoder_decoder', 'category' => 1, 'img_src' => 'images/icons/punycode.png'),
        array('label' => 'HEX Encoder/Decoder', 'url' => '?route=hex_encoder_decoder', 'category' => 1, 'img_src' => 'images/icons/hex.png'),
        array('label' => 'Binary Encoder/Decoder', 'url' => '?route=bin_encoder_decoder', 'category' => 1, 'img_src' => 'images/icons/binary.png'),
        array('label' => 'Torrent Decoder', 'url' => '?route=torrent_decoder', 'category' => 1, 'img_src' => 'images/icons/torrent.png'),
        // 2- Cryptography Tools
        array('label' => 'Message Digest', 'url' => '?route=message_digest', 'category' => 2, 'img_src' => 'images/icons/message_digest.png'),
        array('label' => 'HMAC Generator', 'url' => '?route=hmac_generator', 'category' => 2, 'img_src' => 'images/icons/hmac.png'),
        array('label' => 'CRC32 Generator', 'url' => '?route=crc32_generator', 'category' => 2, 'img_src' => 'images/icons/crc32.png'),
        array('label' => 'Password Generator', 'url' => '?route=password_generator', 'category' => 2, 'img_src' => 'images/icons/password_generator.png'),
        array('label' => 'Cisco Type 7 Password', 'url' => '?route=cisco_type_7', 'category' => 2, 'img_src' => 'images/icons/cisco7.png'),
        array('label' => 'Joomla Password Generator', 'url' => '?route=joomla_password_generator', 'category' => 2, 'img_src' => 'images/icons/joomla.png'),
        array('label' => 'Vb Password Generator', 'url' => '?route=vb_Password_generator', 'category' => 2, 'img_src' => 'images/icons/vbulletin.png'),
        array('label' => 'Htpasswd Generator', 'url' => '?route=htPasswd_generator', 'category' => 2, 'img_src' => 'images/icons/htpasswd_generator.png'),
        array('label' => 'Caesar Cipher', 'url' => '?route=caesar_cipher', 'category' => 2, 'img_src' => 'images/icons/caesar_cipher.png'),
        array('label' => 'Reverse Hash Lookup', 'url' => '?route=reverse_hash_lookup', 'category' => 2, 'img_src' => 'images/icons/reverse_hash_lookup.png'),
        // 3- Web Development Tools
        array('label' => 'HTML Minifier', 'url' => '?route=html_minifier', 'category' => 3, 'img_src' => 'images/icons/html_minifier.png'),
        array('label' => 'HTML Obfuscator', 'url' => '?route=html_obfuscator', 'category' => 3, 'img_src' => 'images/icons/html_obfuscator_1.png'),
        array('label' => 'HTML Escape/Unescape', 'url' => '?route=html_escape_unescape', 'category' => 3, 'img_src' => 'images/icons/html_escape.png'),
        array('label' => 'EMAIL Obfuscator', 'url' => '?route=email_obfuscator', 'category' => 3, 'img_src' => 'images/icons/email_obfuscator.png'),
        array('label' => 'CSS Minifier', 'url' => '?route=css_minifier', 'category' => 3, 'img_src' => 'images/icons/css_minifier.png'),
        array('label' => 'CSS Text Shadow Generator', 'url' => '?route=css_text_shadow', 'category' => 3, 'img_src' => 'images/icons/css_text_shadow.png'),
        array('label' => 'PHP Obfuscator 1', 'url' => '?route=php_obfuscator_1', 'category' => 3, 'img_src' => 'images/icons/php_obfuscator_1.png'),
        // 4- Images Tools
        array('label' => 'Base64 Image Encoder/Decoder', 'url' => '?route=base64_image', 'category' => 4, 'img_src' => 'images/icons/Base64_image.png'),
        array('label' => 'Images Converter', 'url' => '?route=images_converter', 'category' => 4, 'img_src' => 'images/icons/images_converter.png'),
        array('label' => 'Image Resizer', 'url' => '?route=image_resizer', 'category' => 4, 'img_src' => 'images/icons/image_resizer.png'),
        array('label' => 'Image Color Picker', 'url' => '?route=image_color_picker', 'category' => 4, 'img_src' => 'images/icons/color_picker.png'),
        array('label' => 'Share Images', 'url' => '?route=share_images', 'category' => 4, 'img_src' => 'images/icons/share_images.png'),
        // 5- Network Tools
        array('label' => 'IP Address Converter', 'url' => '?route=ip_address_converter', 'category' => 5, 'img_src' => 'images/icons/ip_converter.png'),
        array('label' => 'HTTP Header Status Checker', 'url' => '?route=http_header_status_checker', 'category' => 5, 'img_src' => 'images/icons/http_header.png'),
        array('label' => 'Ping Tool', 'url' => '?route=ping_tool', 'category' => 5, 'img_src' => 'images/icons/ping.png'),
        array('label' => 'IP Geolocation', 'url' => '?route=ip_geolocation', 'category' => 5, 'img_src' => 'images/icons/geolocation.png'),
        array('label' => 'Whois Lookup', 'url' => '?route=whois_lookup', 'category' => 5, 'img_src' => 'images/icons/whois_lookup.png'),
        array('label' => 'Subdomain Finder', 'url' => '?route=subdomain_finder', 'category' => 5, 'img_src' => 'images/icons/subdomain_finder.png'),
        // 6- Pentesting Tools
        array('label' => 'Admin Finder', 'url' => '?route=admin_finder', 'category' => 6, 'img_src' => 'images/icons/admin_finder.png'),
        array('label' => 'Zip Path Traversal', 'url' => '?route=zip_path_traversal', 'category' => 6, 'img_src' => 'images/icons/zip_path_traversal.png'),
        array('label' => 'Website Malware Checker', 'url' => '?route=website_malware_checker', 'category' => 6, 'img_src' => 'images/icons/website_malware_cheker.png'),
        array('label' => 'Google Dorking', 'url' => '?route=google_dorking', 'category' => 6, 'img_src' => 'images/icons/google_dorking.png'),
        array('label' => 'Default Router Settings', 'url' => '?route=default_router_settings', 'category' => 6, 'img_src' => 'images/icons/router_settings.png'),
        // 7- OSINT Tools
        array('label' => 'Search Engines', 'url' => '?route=search_engines', 'category' => 7, 'img_src' => 'images/icons/search_engine.png'),
        array('label' => 'Reverse Image Search', 'url' => '?route=reverse_image_search', 'category' => 7, 'img_src' => 'images/icons/search_image.png'),
        array('label' => 'Images Search', 'url' => '?route=images_search', 'category' => 7, 'img_src' => 'images/icons/images_search.png'),
        array('label' => 'Video Search', 'url' => '?route=video_search', 'category' => 7, 'img_src' => 'images/icons/video_search.png'),
        array('label' => 'Torrent Search', 'url' => '?route=torrent_search', 'category' => 7, 'img_src' => 'images/icons/torrent_search.png'),
        array('label' => 'Cached Pages', 'url' => '?route=cached_pages', 'category' => 7, 'img_src' => 'images/icons/cached_pages.png'),
        array('label' => 'Search phone number', 'url' => '?route=search_phone_number', 'category' => 7, 'img_src' => 'images/icons/phone_number_lookup.png'),
        // 8- AI Tools
        array('label' => 'Email Generator', 'url' => '?route=email_generator', 'category' => 8, 'img_src' => 'images/icons/email.png'),
        array('label' => 'English Teacher', 'url' => '?route=english_teacher', 'category' => 8, 'img_src' => 'images/icons/english_teacher.png'),
        array('label' => 'Translator', 'url' => '?route=translator', 'category' => 8, 'img_src' => 'images/icons/translator.png'),
        // 9- Miscellaneous Tools
        array('label' => 'My Bookmarks', 'url' => '?route=my_bookmarks', 'category' => 9, 'img_src' => 'images/icons/my_bookmarks.png'),
        array('label' => 'Bat Obfuscator', 'url' => '?route=bat_obfuscator', 'category' => 9, 'img_src' => 'images/icons/bat_obfuscator.png'),
        array('label' => 'Lists and Tables', 'url' => '?route=lists_and_tables', 'category' => 9, 'img_src' => 'images/icons/lists.png'),
    );

    private $categories = array(
        array('id' => 1, 'label' => 'Encoding/Decoding Tools', 'css_class_svg' => 'encoding_decoding_tools_svg'),
        array('id' => 2, 'label' => 'Cryptography Tools', 'css_class_svg' => 'cryptography_tools_svg'),
        array('id' => 3, 'label' => 'Web Development Tools', 'css_class_svg' => 'web_development_tools_svg'),
        array('id' => 4, 'label' => 'Images Tools', 'css_class_svg' => 'images_tools_svg'),
        array('id' => 5, 'label' => 'Network Tools', 'css_class_svg' => 'network_tools_svg'),
        array('id' => 6, 'label' => 'Pentesting Tools', 'css_class_svg' => 'pentesting_tools_svg'),
        array('id' => 7, 'label' => 'OSINT Tools', 'css_class_svg' => 'osint_tools_svg'),
        array('id' => 8, 'label' => 'AI Tools', 'css_class_svg' => 'ai_tools_svg'),
        array('id' => 9, 'label' => 'Miscellaneous Tools', 'css_class_svg' => 'miscellaneous_svg'),
    );

    /*  public function __construct($menuItems, $categories) {
        $this->menuItems = $menuItems;
        $this->categories = $categories;
      }*/

    public function render($categoryLabel = null)
    {
        $menu = '';
        foreach ($this->categories as $category) {
            if ($categoryLabel === null || $categoryLabel == $category['label']) {
                $menu .= '<header id="' . $category['label'] . '" class="header"><h3 class="' . $category['css_class_svg'] . '">' . $category['label'] . '</h3></header>';
                $menu .= '<div class="menu-grid">';
                foreach ($this->menuItems as $item) {
                    if ($item['category'] == $category['id']) {
                        $menu .= '<div class="col">';
                        $menu .= '<a href="' . $item['url'] . '" class="menu-item"><img class="toolimg" src="' . $item['img_src'] . '" alt="' . $item['label'] . '"><h3 class="thumbnail_caption">' . $item['label'] . '</h3></a>';
                        $menu .= '</div>';
                    }
                }
                $menu .= '</div>';
            }
        }
        return $menu;
    }
}

?>
