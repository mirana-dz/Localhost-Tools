<?php

namespace App\Controllers;

class BasicController
{

    public function home()
    {
        $pageTitle = 'Home';
        $pageCategory = 'Home';
        $pageDescription = '<p class="first">Welcome to <span style="color:#a6780c; font-weight:bold">' . SITE_NAME . '</span>, a set of tools for helping development.</p>';

        // Load the view for the Home page
        require_once('../app/views/home.php');
    }

    public function cachedPages()
    {

        $pageTitle = 'Cached Pages';
        $pageCategory = 'OSINT Tools';
        $pageDescription = '<p>This simple web tool lets you retrieve the cached page of any URL. A cached page is an old version of a web page that was saved at a specific time by a search engine or web crawler.</p>';

        require_once('../app/views/cached_pages.php');
    }

    public function cssTextShadow()
    {

        $pageTitle = 'CSS Text Shadow Generator';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>Use this CSS3 text shadow generator to easily add text shadow styles into your web project.</p>';

        require_once('../app/views/css_text_shadow.php');
    }

    public function googleDorking()
    {

        $pageTitle = 'Google Dorking';
        $pageCategory = 'Pentesting Tools';
        $pageDescription = '<p>Google Dorking is a technique used to find the information exposed accidentally to the internet. For example, log files with usernames and passwords or cameras, etc. It is done mostly by using the queries to go after a specific target gradually. We start with collecting as much data as we can using general queries, and then we can go specific by using complex queries.</p>';

        require_once('../app/views/google_dorking.php');
    }

    public function imageColorPicker()
    {

        $pageTitle = 'Image Color Picker';
        $pageCategory = 'Images Tools';
        $pageDescription = '<p>Pick color (HEX - RGB - HSL) from image or your screenshot.</p>';

        require_once('../app/views/image_color_picker.php');
    }

    public function imageResizer()
    {

        $pageTitle = 'Image Resizer';
        $pageCategory = 'Images Tools';
        $pageDescription = '<p>Image Resizer is a web-based tool that allows users to easily resize and compress images. it supports various image formats and provides a preview of the resized image before downloading.</p>';

        require_once('../app/views/image_resizer.php');
    }

    public function imagesSearch()
    {

        $pageTitle = 'Images Search';
        $pageCategory = 'OSINT Tools';
        $pageDescription = '<p>Search images on the internet easily by typing into ONE unified search box.</p>';

        require_once('../app/views/images_search.php');
    }

    public function listsAndTables()
    {

        $pageTitle = 'Lists and Tables';
        $pageCategory = 'Miscellaneous Tools';
        $pageDescription = '<p>....</p>';

        require_once('../app/views/lists_and_tables.php');
    }

    public function myBookmarks()
    {

        $pageTitle = 'My Bookmarks';
        $pageCategory = 'Miscellaneous Tools';
        $pageDescription = '<p>My <b>Bookmarks</b>, A list with shortcuts to my favorite web pages for easy access to them.</p>';

        require_once('../app/views/my_bookmarks.php');
    }

    public function passwordGenerator()
    {

        $pageTitle = 'Password Generator';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Generate secure, random passwords to stay safe online.</p>';

        require_once('../app/views/password_generator.php');
    }

    public function reverseImageSearch()
    {

        $pageTitle = 'Reverse Image Search';
        $pageCategory = 'OSINT Tools';
        $pageDescription = '<p>Reverse image search is a super-fast image finder that helps you find similar images online. Just click the “Upload Image” button or “Enter Image URL” to search by image accurately.</p>';

        require_once('../app/views/reverse_image_search.php');
    }

    public function searchEngines()
    {

        $pageTitle = 'Search Engines';
        $pageCategory = 'OSINT Tools';
        $pageDescription = '<p>Search anything on the internet easily by typing into ONE unified search box.</p>';

        require_once('../app/views/search_engines.php');
    }

    public function searchPhoneNumber()
    {

        $pageTitle = 'Search phone number';
        $pageCategory = 'OSINT Tools';
        $pageDescription = '<p>A telephone number is often valuable information in OSINT investigations. There are many ways to investigate a national or international phone number. With the following custom search tool you can check if the phone number is found in different formats via search engines or via Reverse Number Lookup tools.</p>';

require_once('../app/views/search_phone_number.php');
    }

    public function videoSearch()
    {

        $pageTitle = 'Video Search';
        $pageCategory = 'OSINT Tools';
        $pageDescription = '<p>Search video on the internet easily by typing into ONE unified search box.</p>';

        require_once('../app/views/video_search.php');
    }

    public function websiteMalwareChecker()
    {

        $pageTitle = 'Website Malware Checker';
        $pageCategory = 'Pentesting Tools';
        $pageDescription = '<p>Scan your website for known viruses, malware, blacklisting status from Google, Norton, Phish tank, ... etc.</p>';

        require_once('../app/views/website_malware_checker.php');
    }
}