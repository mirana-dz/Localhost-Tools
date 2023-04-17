<?php

namespace App\Controllers;

class IpAddressConverterController
{

    public function index()
    {

        $pageTitle = 'IP Address Converter';
        $pageCategory = 'Network Tools';
        $pageDescription = '<p>Convert IP addresses to decimal format, integer format, and more!</p>';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();
            if (filter_var($input, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                $decimal_format = preg_split("/[.]+/", $input);
                $decimal_format = (double)($decimal_format[0] * 16777216) + ($decimal_format[1] * 65536) + ($decimal_format[2] * 256) + ($decimal_format[3]);
                $binary_format = decbin($decimal_format);
                $hex_format = '0x' . dechex($decimal_format);
                $octal_format = decoct($decimal_format);
                $ipv4_to_ipv6 = $this->convert_ipv4_to_ipv6($input);
                echo '<label class="field-label block" for="standard_format">Standard Format:</label>
<input type="text" id="standard_format" name="standard_format" class="doSelect" value="' . $input . '">
<label class="field-label block" for="decimal_format">Decimal Format:</label>
<input type="text" id="decimal_format" name="decimal_format" class="doSelect" value="' . $decimal_format . '">
<label class="field-label block" for="binary_format">Binary Format:</label>
<input type="text" id="binary_format" name="binary_format" class="doSelect" value="' . $binary_format . '">
<label class="field-label block" for="hex_format">Hexadecimal Format:</label>
<input type="text" id="hex_format" name="hex_format" class="doSelect" value="' . $hex_format . '">
<label class="field-label block" for="octal_format">Octal Format:</label>
<input type="text" id="octal_format" name="octal_format" class="doSelect" value="' . $octal_format . '">
<label class="field-label block" for="ipv6_short">IPv6 (short):</label>
<input type="text" id="ipv6_short" name="ipv6_short" class="doSelect" value="' . $ipv4_to_ipv6['short'] . '">
<label class="field-label block" for="ipv6_long">IPv6 (long):</label>
<input type="text" id="ipv6_long" name="ipv6_long" class="doSelect" value="' . $ipv4_to_ipv6['long'] . '"><br><br>';
            } else {
                echo '... is not a valid IPv4 address';
            }


            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/ip_address_converter.php');
    }

    private function convert_ipv4_to_ipv6($ip)
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) {
            return false;
        }

        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            return $ip;
        }

        $bytes = array_map('dechex', explode('.', $ip));

        $ipV6['short'] = vsprintf('::ffff:%02s%02s:%02s%02s', $bytes);
        $ipV6['long'] = vsprintf('0:0:0:0:0:ffff:%02s%02s:%02s%02s', $bytes);

        return $ipV6;
    }
}