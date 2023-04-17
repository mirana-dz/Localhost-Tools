<?php

namespace App\Controllers;

class PHPObfuscator1Controller
{
    public function index()
    {

        $pageTitle = 'PHP Obfuscator 1';
        $pageCategory = 'Web Development Tools';
        $pageDescription = '<p>The PHP Obfuscator tool obfuscates the source code of a PHP script so that it is difficult to read by people and it\'s significance may be recognized only with mini difficulty.</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();

            $return_value = match ($_POST['functions']) {
                'obfu1' => $this->phpObfuscator1($input),
                'obfu2' => $this->phpObfuscator2($input),
                'obfu3' => $this->phpObfuscator3($input),
                'obfu4' => $this->phpObfuscator4($input),
            };
            echo $return_value;
            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/php_obfuscator_1.php');
    }

    private function phpObfuscator1($phpCode): string
    {
        // ${"\x70\x68\x70"}["\x63\x6f\x64\x65\x31"] = rawurlencode(base64_encode(gzdeflate('CodePhp')));
        $codeObfuscated = strrev(base64_encode(gzdeflate(gzcompress($phpCode))));
        return '<?php ${"\x70\x68\x70"}["\x63\x6f\x64\x65\x31"]="Sy1LzNFQt7dT10uvKs1Lzs8tKEotLtZIr8rMS8tJLEnVSEosTjUziU9JTc5PSdUoLikqSi3TUKlWiqkwN4ipMLMA0Uq10UC%2BmTEQpwGxCRCbxlQYGynFaoKANQA%3D"; ${"\x70\x68\x70"}["\x63\x6f\x64\x65\x32"]="' . $codeObfuscated . '"; eval(gzinflate(base64_decode(rawurldecode(${"\x70\x68\x70"}["\x63\x6f\x64\x65\x31"])))); ?>';
    }

    private function phpObfuscator2($phpCode): string
    {
        $codeObfuscated = strrev(base64_encode(gzdeflate(gzdeflate(gzcompress($phpCode)))));
        return '<?php ${"\x70\x68\x70"}["\x63\x6f\x64\x65\x31"]="Sy1LzNFQt7dT10uvKs1Lzs8tKEotLtZIr8rMS8tJLElFYiUlFqeamcSnpCbnp6RqFJcUFaWWaahUK8VUmBvEVJhZgGil2mgg38wYiNOA2ASITWMqjI2UYjXBwBoA"; ${"\x70\x68\x70"}["\x63\x6f\x64\x65\x32"]="' . $codeObfuscated . '"; eval(gzinflate(base64_decode(rawurldecode(${"\x70\x68\x70"}["\x63\x6f\x64\x65\x31"])))); ?>';
    }

    private function phpObfuscator3($phpCode): string
    {
        $codeObfuscated = strrev(base64_encode(gzdeflate(gzdeflate(gzdeflate(gzcompress(gzcompress($phpCode)))))));
        return '<?php ${"\x70\x68\x70"}["\x63\x6f\x64\x65\x31"]="Sy1LzNFQsrdT0kuvKs1Lzs8tKEotLtZA42TmpeUklqRiZSUlFqeamcSnpCbnp6RqFJcUFaWWaahUK8VUmBvEVJhZgGil2mgg38wYiNOA2ASITWMqjI2UYjWhwBoA"; ${"\x70\x68\x70"}["\x63\x6f\x64\x65\x32"]="' . $codeObfuscated . '"; eval(gzinflate(base64_decode(rawurldecode(${"\x70\x68\x70"}["\x63\x6f\x64\x65\x31"])))); ?>';
    }

    private function phpObfuscator4($phpCode): string
    {
        $codeObfuscated = strrev(base64_encode(gzcompress(gzdeflate(gzcompress(gzdeflate(gzcompress(gzdeflate(gzcompress(gzdeflate(str_rot13($phpCode)))))))))));
        return '<?php ${"\x70\x68\x70"}["\x63\x6f\x64\x65\x31"]="Sy1LzNFQsrdT0isuKYovyi8xNNZIr8rMS8tJLEkFskrzkvNzC4pSi4upI5yUWJxqZhKfkpqcn5KqAbSzKLVMQ6VaKabC3CCmwswCRCvVRgP5ZsZAnAbEJkBsGlNhbKQUq4kErAE%3D"; ${"\x70\x68\x70"}["\x63\x6f\x64\x65\x32"]="' . $codeObfuscated . '"; eval(gzinflate(base64_decode(rawurldecode(${"\x70\x68\x70"}["\x63\x6f\x64\x65\x31"])))); ?>';
    }
}