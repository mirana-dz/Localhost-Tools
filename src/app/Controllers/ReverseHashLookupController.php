<?php

namespace App\Controllers;

use App\Libraries\ReverseHashLookup;


class ReverseHashLookupController
{
    public function index()
    {

        $pageTitle = 'Reverse Hash Lookup';
        $pageCategory = 'Cryptography Tools';
        $pageDescription = '<p>Decode hashes into the original text.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $inputData = trim($_POST['input']);
            $algorithm = trim($_POST['algorithm']);
            ob_start();

            $ReverseHashLookup = new ReverseHashLookup();

            echo '<p>Decrypt Hash Results for: <b>' . $inputData . '</b>.</p>';
            echo '<table class="tb"><tbody>
              <tr>
                <th>Database</th>
                <th>Result</th>
              </tr>';
            switch ($algorithm) {
                case 'md5':
                    list($reverseGromWeb, $md5Decrypt, $hashToolKit, $nitrxgenMd5Db) = $ReverseHashLookup->reverseMd5Hash($inputData);
                    echo '<tr><td>reverseGromWeb</td><td>' . $reverseGromWeb . '</td></tr>';
                    echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                    echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
					echo '<tr><td>nitrxgenMd5Db</td><td>' . $nitrxgenMd5Db . '</td></tr>';
                    break;
                case 'sha1':
                    list($reverseGromWeb, $md5Decrypt, $hashToolKit) = $ReverseHashLookup->reverseSha1Hash($inputData);
                    echo '<tr><td>reverseGromWeb</td><td>' . $reverseGromWeb . '</td></tr>';
                    echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                    echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
                    break;
                case 'sha256':
                    list($md5Decrypt, $hashToolKit) = $ReverseHashLookup->reverseSha256Hash($inputData);
                    echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                    echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
                    break;
                case 'sha384':
                    list($md5Decrypt, $hashToolKit) = $ReverseHashLookup->reverseSha384Hash($inputData);
                    echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                    echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
                    break;
                case 'sha512':
                    list($md5Decrypt, $hashToolKit) = $ReverseHashLookup->reverseSha512Hash($inputData);
                    echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                    echo '<tr><td>hashToolKit</td><td>' . $hashToolKit . '</td></tr>';
                    break;
                case 'ntlm':
                    list($md5Decrypt) = $ReverseHashLookup->reverseNTLMHash($inputData);
                    echo '<tr><td>md5Decrypt</td><td>' . $md5Decrypt . '</td></tr>';
                    break;

            }
            echo '</tbody></table>';

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/reverse_hash_lookup.php');
    }
}