<?php

namespace App\Controllers;

use App\Libraries\ReverseHashLookup;


class ReverseHashLookupController
{
    public function index(): void
    {

        $pageTitle = 'Reverse Hash Lookup';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Decode hashes into the original text.</p>';


        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require_once('../app/views/reverse_hash_lookup.php');
            return;
        }

        $input = trim($_POST['input'] ?? '');
        $algorithm = trim($_POST['algorithm'] ?? '');

        if (empty($input) || empty($algorithm)) {
            echo 'Invalid input.';
            return;
        }


        $ReverseHashLookup = new ReverseHashLookup();

        echo '<p>Decrypt Hash Results for: <b>' . $input . '</b>.</p>';
        echo '<table class="tb"><tbody>
              <tr>
                <th>Database</th>
                <th>Result</th>
              </tr>';
        switch ($algorithm) {
            case 'md5':
                list($reverseGromWeb, $md5Decrypt, $hashToolKit, $nitrxgenMd5Db) = $ReverseHashLookup->reverseMd5Hash($input);
                echo '<tr><td>reverseGromWeb</td><td>' . $reverseGromWeb . '</td></tr>';
                echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
                echo '<tr><td>nitrxgenMd5Db</td><td>' . $nitrxgenMd5Db . '</td></tr>';
                break;
            case 'sha1':
                list($reverseGromWeb, $md5Decrypt, $hashToolKit) = $ReverseHashLookup->reverseSha1Hash($input);
                echo '<tr><td>reverseGromWeb</td><td>' . $reverseGromWeb . '</td></tr>';
                echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
                break;
            case 'sha256':
                list($md5Decrypt, $hashToolKit) = $ReverseHashLookup->reverseSha256Hash($input);
                echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
                break;
            case 'sha384':
                list($md5Decrypt, $hashToolKit) = $ReverseHashLookup->reverseSha384Hash($input);
                echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
                break;
            case 'sha512':
                list($md5Decrypt, $hashToolKit) = $ReverseHashLookup->reverseSha512Hash($input);
                echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
                break;
            case 'ntlm':
                list($md5Decrypt) = $ReverseHashLookup->reverseNTLMHash($input);
                echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                break;

        }
        echo '</tbody></table>';
    }
}