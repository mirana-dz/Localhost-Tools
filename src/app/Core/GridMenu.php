<?php

//namespace App\Core;

/**
 * Class GridMenu represents a grid menu with the various tools
 */
class GridMenu
{

    /* 
	private $menuItems;
    private $categories;
	*/

    /*
     * @var array $menuItems An array of menu items, each containing label, url, category, and img_src
     */
    private array $menuItems = array(
        // 1- Encoder & Decoder
        array('label' => 'Base64 Encoder/Decoder', 'url' => '?route=base64_encoder_decoder', 'category' => 1, 'img_src' => 'assets/images/icons/base64_encoder.png'),
        array('label' => 'URL Encoder/Decoder', 'url' => '?route=url_encoder_decoder', 'category' => 1, 'img_src' => 'assets/images/icons/url_encoder.png'),
        array('label' => 'UU Encoder/Decoder', 'url' => '?route=uu_encoder_decoder', 'category' => 1, 'img_src' => 'assets/images/icons/uu_encoder.png'),
        array('label' => 'Rot13 Encoder/Decoder', 'url' => '?route=rot13_encoder_decoder', 'category' => 1, 'img_src' => 'assets/images/icons/rot13_encoder.png'),
        array('label' => 'Punycode Encoder/Decoder', 'url' => '?route=punycode_encoder_decoder', 'category' => 1, 'img_src' => 'assets/images/icons/punycode.png'),
        array('label' => 'HEX Encoder/Decoder', 'url' => '?route=hex_encoder_decoder', 'category' => 1, 'img_src' => 'assets/images/icons/hex.png'),
        array('label' => 'Binary Encoder/Decoder', 'url' => '?route=bin_encoder_decoder', 'category' => 1, 'img_src' => 'assets/images/icons/binary.png'),
        array('label' => 'Torrent Decoder', 'url' => '?route=torrent_decoder', 'category' => 1, 'img_src' => 'assets/images/icons/torrent.png'),
        // 2- Cryptography Tools
        array('label' => 'Message Digest', 'url' => '?route=message_digest', 'category' => 2, 'img_src' => 'assets/images/icons/message_digest.png'),
        array('label' => 'Hash Generator', 'url' => '?route=hash_generator', 'category' => 2, 'img_src' => 'assets/images/icons/hash_generator.png'),
        array('label' => 'HMAC Generator', 'url' => '?route=hmac_generator', 'category' => 2, 'img_src' => 'assets/images/icons/hmac.png'),
        array('label' => 'CRC32 Generator', 'url' => '?route=crc32_generator', 'category' => 2, 'img_src' => 'assets/images/icons/crc32.png'),
        array('label' => 'Password Generator', 'url' => '?route=password_generator', 'category' => 2, 'img_src' => 'assets/images/icons/password_generator.png'),
        array('label' => 'Cisco Type 7 Password', 'url' => '?route=cisco_type_7', 'category' => 2, 'img_src' => 'assets/images/icons/cisco7.png'),
        array('label' => 'Joomla Password Generator', 'url' => '?route=joomla_password_generator', 'category' => 2, 'img_src' => 'assets/images/icons/joomla.png'),
        array('label' => 'Vb Password Generator', 'url' => '?route=vb_Password_generator', 'category' => 2, 'img_src' => 'assets/images/icons/vbulletin.png'),
        array('label' => 'Drupal Password Generator', 'url' => '?route=drupal_password_generator', 'category' => 2, 'img_src' => 'assets/images/icons/drupal.png'),
        array('label' => 'Htpasswd Generator', 'url' => '?route=htPasswd_generator', 'category' => 2, 'img_src' => 'assets/images/icons/htpasswd_generator.png'),
        array('label' => 'Caesar Cipher', 'url' => '?route=caesar_cipher', 'category' => 2, 'img_src' => 'assets/images/icons/caesar_cipher.png'),
        array('label' => 'Reverse Hash Lookup', 'url' => '?route=reverse_hash_lookup', 'category' => 2, 'img_src' => 'assets/images/icons/reverse_hash_lookup.png'),
        array('label' => 'Password Decoder', 'url' => '?route=password_decoder', 'category' => 2, 'img_src' => 'assets/images/icons/password_decoder.png'),
        // 3- Web Development Tools
        array('label' => 'HTML Minifier', 'url' => '?route=html_minifier', 'category' => 3, 'img_src' => 'assets/images/icons/html_minifier.png'),
        array('label' => 'HTML Obfuscator', 'url' => '?route=html_obfuscator', 'category' => 3, 'img_src' => 'assets/images/icons/html_obfuscator_1.png'),
        array('label' => 'HTML Escape/Unescape', 'url' => '?route=html_escape_unescape', 'category' => 3, 'img_src' => 'assets/images/icons/html_escape.png'),
        array('label' => 'EMAIL Obfuscator', 'url' => '?route=email_obfuscator', 'category' => 3, 'img_src' => 'assets/images/icons/email_obfuscator.png'),
        array('label' => 'JS Minifier', 'url' => '?route=js_minifier', 'category' => 3, 'img_src' => 'assets/images/icons/js_minifier.png'),
        array('label' => 'CSS Minifier', 'url' => '?route=css_minifier', 'category' => 3, 'img_src' => 'assets/images/icons/css_minifier.png'),
        array('label' => 'CSS Text Shadow Generator', 'url' => '?route=css_text_shadow', 'category' => 3, 'img_src' => 'assets/images/icons/css_text_shadow.png'),
        array('label' => 'PHP Obfuscator 1', 'url' => '?route=php_obfuscator_1', 'category' => 3, 'img_src' => 'assets/images/icons/php_obfuscator_1.png'),
        // 4- Images Tools
        array('label' => 'Base64 Image Encoder/Decoder', 'url' => '?route=base64_image', 'category' => 4, 'img_src' => 'assets/images/icons/Base64_image.png'),
        array('label' => 'Images Converter', 'url' => '?route=images_converter', 'category' => 4, 'img_src' => 'assets/images/icons/images_converter.png'),
        array('label' => 'Image Resizer', 'url' => '?route=image_resizer', 'category' => 4, 'img_src' => 'assets/images/icons/image_resizer.png'),
        array('label' => 'Image Color Picker', 'url' => '?route=image_color_picker', 'category' => 4, 'img_src' => 'assets/images/icons/color_picker.png'),
        array('label' => 'Share Images', 'url' => '?route=share_images', 'category' => 4, 'img_src' => 'assets/images/icons/share_images.png'),
        // 5- Network Tools
        array('label' => 'IP Address Converter', 'url' => '?route=ip_address_converter', 'category' => 5, 'img_src' => 'assets/images/icons/ip_converter.png'),
        array('label' => 'HTTP Header Status Checker', 'url' => '?route=http_header_status_checker', 'category' => 5, 'img_src' => 'assets/images/icons/http_header.png'),
        array('label' => 'Ping Tool', 'url' => '?route=ping_tool', 'category' => 5, 'img_src' => 'assets/images/icons/ping.png'),
        array('label' => 'Ports List', 'url' => '?route=ports_list', 'category' => 5, 'img_src' => 'assets/images/icons/ports_list.png'),
        array('label' => 'IP Geolocation', 'url' => '?route=ip_geolocation', 'category' => 5, 'img_src' => 'assets/images/icons/geolocation.png'),
        array('label' => 'Whois Lookup', 'url' => '?route=whois_lookup', 'category' => 5, 'img_src' => 'assets/images/icons/whois_lookup.png'),
        array('label' => 'Subdomain Finder', 'url' => '?route=subdomain_finder', 'category' => 5, 'img_src' => 'assets/images/icons/subdomain_finder.png'),
        // 6- Pentesting Tools
        array('label' => 'Admin Finder', 'url' => '?route=admin_finder', 'category' => 6, 'img_src' => 'assets/images/icons/admin_finder.png'),
        array('label' => 'Zip Path Traversal', 'url' => '?route=zip_path_traversal', 'category' => 6, 'img_src' => 'assets/images/icons/zip_path_traversal.png'),
        array('label' => 'Website Malware Checker', 'url' => '?route=website_malware_checker', 'category' => 6, 'img_src' => 'assets/images/icons/website_malware_cheker.png'),
        array('label' => 'Google Dorking', 'url' => '?route=google_dorking', 'category' => 6, 'img_src' => 'assets/images/icons/google_dorking.png'),
        array('label' => 'Default Router Settings', 'url' => '?route=default_router_settings', 'category' => 6, 'img_src' => 'assets/images/icons/router_settings.png'),
        array('label' => 'Default Credentials', 'url' => '?route=default_credentials', 'category' => 6, 'img_src' => 'assets/images/icons/default_login.png'),
        // 7- OSINT Tools
        array('label' => 'Search Engines', 'url' => '?route=search_engines', 'category' => 7, 'img_src' => 'assets/images/icons/search_engine.png'),
        array('label' => 'Reverse Image Search', 'url' => '?route=reverse_image_search', 'category' => 7, 'img_src' => 'assets/images/icons/search_image.png'),
        array('label' => 'Images Search', 'url' => '?route=images_search', 'category' => 7, 'img_src' => 'assets/images/icons/images_search.png'),
        array('label' => 'Video Search', 'url' => '?route=video_search', 'category' => 7, 'img_src' => 'assets/images/icons/video_search.png'),
        array('label' => 'Torrent Search', 'url' => '?route=torrent_search', 'category' => 7, 'img_src' => 'assets/images/icons/torrent_search.png'),
        array('label' => 'Cached Pages', 'url' => '?route=cached_pages', 'category' => 7, 'img_src' => 'assets/images/icons/cached_pages.png'),
        array('label' => 'Search phone number', 'url' => '?route=search_phone_number', 'category' => 7, 'img_src' => 'assets/images/icons/phone_number_lookup.png'),
        // 8- AI Tools
        array('label' => 'Email Generator', 'url' => '?route=email_generator', 'category' => 8, 'img_src' => 'assets/images/icons/email.png'),
        array('label' => 'English Teacher', 'url' => '?route=english_teacher', 'category' => 8, 'img_src' => 'assets/images/icons/english_teacher.png'),
        array('label' => 'Translator', 'url' => '?route=translator', 'category' => 8, 'img_src' => 'assets/images/icons/translator.png'),
        // 9- Miscellaneous Tools
        array('label' => 'My Bookmarks', 'url' => '?route=my_bookmarks', 'category' => 9, 'img_src' => 'assets/images/icons/my_bookmarks.png'),
        array('label' => 'Bat Obfuscator', 'url' => '?route=bat_obfuscator', 'category' => 9, 'img_src' => 'assets/images/icons/bat_obfuscator.png'),
        array('label' => 'Lists and Tables', 'url' => '?route=lists_and_tables', 'category' => 9, 'img_src' => 'assets/images/icons/lists.png'),
    );

    /**
     * @var array $categories An array of categories with their associated data.
     * Each category has an 'id', 'label', and 'css_class_svg'.
     */
    private array $categories = array(
        array('id' => 1, 'label' => 'Encoding/Decoding Tools', 'css_class_svg' => 'encoding_decoding_tools_svg'),
        array('id' => 2, 'label' => 'Cryptography Tools', 'css_class_svg' => 'cryptography_tools_svg'),
        array('id' => 3, 'label' => 'Web Development Tools', 'css_class_svg' => 'web_development_tools_svg'),
        array('id' => 4, 'label' => 'Images Tools', 'css_class_svg' => 'images_tools_svg'),
        array('id' => 5, 'label' => 'Network Tools', 'css_class_svg' => 'network_tools_svg'),
        array('id' => 6, 'label' => 'Pentesting Tools', 'css_class_svg' => 'pentesting_tools_svg'),
        array('id' => 7, 'label' => 'OSINT Tools', 'css_class_svg' => 'osint_tools_svg'),
        array('id' => 8, 'label' => 'AI Tools', 'css_class_svg' => 'ai_tools_svg'),
        array('id' => 9, 'label' => 'Miscellaneous Tools', 'css_class_svg' => 'miscellaneous_tools_svg'),
    );

    /*  
	public function __construct($menuItems, $categories) {
    $this->menuItems = $menuItems;
    $this->categories = $categories;
    }
	*/

    /**
     * Renders the menu items grouped by category.
     *
     * @param string|null $categoryLabel Optional category label to filter the menu by.
     * @return string The HTML markup for the menu.
     */
    public function render(string $categoryLabel = null): string
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