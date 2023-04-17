<?php

// Autocomplete used in ?route=google_dorking

$categoryList = array('google_dorks_all_cat', 'advisories_and_vulnerabilities', 'error_messages', 'files_containing_juicy_info',
    'files_containing_passwords', 'files_containing_usernames', 'footholds', 'network_or_vulnerability_data',
    'pages_containing_login_portals', 'sensitive_directories', 'sensitive_online_shopping_info',
    'various_online_devices', 'vulnerable_files', 'vulnerable_servers', 'web_server_detection');

$category = $_GET['category'] ?? '';
$term = $_GET['term'] ?? '';

// Only allow categoryList
if (!in_array($category, $categoryList)) {
    echo "ERROR: File not found!";
    exit;
}

$fileName = __DIR__ . '/files/google-hacking-database/' . $category . '.txt';

if (file_exists($fileName)) {
    $file = file(__DIR__ . '/files/google-hacking-database/' . $category . '.txt');
}

if (!empty($file)) {
    if (!empty($term) && strlen($term) > 1) {
        foreach ($file as $menuItem) {
            if (preg_match('/^.*' . $term . '/i', $menuItem)) {
                $result[] = $menuItem;
            }
        }
    }
} else {
    echo "ERROR: File not found!";
    exit;
}

if (!empty($result))
    echo json_encode($result);