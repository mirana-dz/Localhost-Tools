# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## Version [1.2.0] Beta - 2023-05-01

### Added
 - Added Password Decoder tool to decode encrypted passwords for various formats such as Cisco Type 7, Cisco VPN Client Password, Groupe Policy Processing, etc.
 - Added Base58 tool for encoding and decoding data in Base58 format.
 - Added documentation section for some tools to provide detailed information about their usage and functionality.
 - Added SVG icons to the left of input type text fields for better UI and user experience. These icons include email, IP, URL, and other relevant icons.

### Fixed
 - Fixed minor bugs and glitches in the application to provide a seamless user experience.

### Changed
 - Changed Select Search Engine by buttons in Reverse Image Search tool for a better user experience.

### Updated
 - Updated composer.json to include the latest dependencies and ensure compatibility with the latest versions of PHP and other libraries.
 - Updated jquery-3.6.0 to jquery-3.6.4 for better security and performance.
 - Updated spectrum-1.8.1 to spectrum-2.0.10 for better UI and performance.
 - Updated jquery-validation-1.19.3 to jquery-validation-1.19.5 for better validation of form inputs.

## Version [1.1.0] - 2023-04-24

### Added
 - Added Hash Generator tool for generating hash values of different algorithms
 - Added Default Credentials tool for displaying a list of default usernames and passwords for various applications and devices
 - Added JS Minifier tool for compressing JavaScript code and reducing its file size for faster loading times.
 - Added base32 encoder/decoder tool for encoding and decoding text in base32 format
 - Added CRC32C tool for computing CRC32C checksum of data
 - Added 1337x and rutor to Torrent Search for searching torrents on additional websites
 - Added Drupal 7 Password Hash Generator tool for generating secure password hashes that comply with Drupal 7 password storage standards. 
 - Added Ports List (Service Name and Transport Protocol Port Number Registry) for providing a comprehensive list of port numbers used by different services and protocols.
 - Added Reverse Hash Lookup feature from the Nitrxgen MD5 database for quickly finding the plaintext value of a given MD5 hash.
 - Added a new style for radio button for a better user experience
 - Added PHPDoc for improved code documentation
 - Added "Issues & Organisations We Are Happy To Show Our Support For" section on the About page to highlight the social causes and non-profit organizations that we support.
 - Added README-AR.md in Arabic language for arabic speakers
 - Added index-ar.html in _docs folder for providing documentation in Arabic
 
 ### Fixed
 - Fixed minor bugs and glitches in the application
 - Optimized the Path code in header.php for improved performance
 - Fixed form-flex and added placeholders for multiple input fields

### Changed
 - Changed select by radio button in CRC32 Generator and Email Generator page for a better user experience
 - Changed 'Loading ...' text to a loading SVG for a better visual experience
 - Changed 'switch' statement to 'match' expression for better code readability and maintainability

### Deprecated
 - Deprecated 'https://www.google.com/searchbyimage?&image_url=' in Reverse image search page due to 
   Google API changes and replaced it with 'https://lens.google.com/uploadbyurl?url='
 - Deprecated the use of utf8_encode() function and recommended using mb_convert_encoding() function instead as per [https://php.watch/versions/8.2/utf8_encode-utf8_decode-deprecated](https://php.watch/versions/8.2/utf8_encode-utf8_decode-deprecated)

### Updated
 - Updated composer.json to include the latest dependencies and ensure compatibility with the latest versions of PHP and other libraries.

### Removed
 - Removed the unused main.png, loading.gif files
 - Removed the unused base64_decoder.psd, rot13_decoder.psd, url_decoder.psd, and uu_decoder.psd files to reduce clutter and optimize the application.

## Version [1.0.0] - 2023-04-15
 - Initial public release.