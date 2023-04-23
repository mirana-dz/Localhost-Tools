<?php

namespace App\Controllers;

use Exception;

class IpGeolocationController
{

    public function index()
    {

        $pageTitle = 'IP Geolocation';
        $pageCategory = 'Network Tools';
        $pageDescription = '<p>IP Geolocation solution to look up for the geolocation of a given IP address. Supports both IPv4 and IPv6. Enter a valid IPv4 or IPv6 and then click the lookup button. If the IP address is valid, the result will be displayed accordingly. The geographical info of the IP address consists of country, region, city, latitude, longitude, timezone, and more ...</p>';

        $input = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = trim($_POST['input']);
            ob_start();

            try {
                $data = $this->ipApiJson($input);
            } catch (Exception $e) {
                echo $e->getMessage();
            }

            if (!empty($data)) {
                echo '<b>Status</b> : ' . $data['status'] . '<br> 		
		        <b>IP</b> : ' . $data['query'] . '<br> 
		        <b>Country</b> : ' . $data['country'] . '<br> 		
		        <b>Region</b> : ' . $data['region'] . '<br> 		
		        <b>RegionName</b> : ' . $data['regionName'] . '<br> 		
		        <b>City</b> : ' . $data['city'] . '<br> 
		        <b>Latitude</b> : ' . $data['lat'] . '<br> 
		        <b>Longitude</b> : ' . $data['lon'] . '<br> 
		        <b>Timezone</b> : ' . $data['timezone'] . '<br> 
		        <b>Internet Service Provider</b> : ' . $data['isp'] . '<br> 
		        <b>Autonomous System</b> : ' . $data['as'] . '<br>';
            }

            $result = ob_get_clean();
            echo $result;
            exit;
        }

        require_once('../app/views/ip_geolocation.php');
    }

    private function ipApiJson($ipAddress): array
    {
         if (!filter_var($ipAddress, FILTER_VALIDATE_IP))
           throw new Exception("$ipAddress is not a valid IP address");

        $getApiJson = @file_get_contents("http://ip-api.com/json/" . $ipAddress);

        if (!$getApiJson)
            throw new Exception("Connection error");

        //Status
        $statusJson = explode('"status":"', $getApiJson);
        $statusJson2 = explode('",', $statusJson[1]);
        $data['status'] = $statusJson2[0];

        if ($data['status'] == 'fail')
            throw new Exception("fail");

        //Country
        $countryJson = explode('"country":"', $getApiJson);
        $countryJson2 = explode('",', $countryJson[1]);
        $data['country'] = $countryJson2[0];
        //CountryCode
        $countryCodeJson = explode('"countryCode":"', $getApiJson);
        $countryCodeJson2 = explode('",', $countryCodeJson[1]);
        $data['countryCode'] = $countryCodeJson2[0];
        //Region
        $regionJson = explode('"region":"', $getApiJson);
        $regionJson2 = explode('",', $regionJson[1]);
        $data['region'] = $regionJson2[0];
        //RegionName
        $regionNameJson = explode('"regionName":"', $getApiJson);
        $regionNameJson2 = explode('",', $regionNameJson[1]);
        $data['regionName'] = $regionNameJson2[0];
        //City
        $cityJson = explode('"city":"', $getApiJson);
        $cityJson2 = explode('",', $cityJson[1]);
        $data['city'] = $cityJson2[0];
        //Zip
        $zipJson = explode('"zip":"', $getApiJson);
        $zipJson2 = explode('",', $zipJson[1]);
        $data['zip'] = $zipJson2[0];
        //Latitude
        $latJson = explode('"lat":', $getApiJson);
        $latJson2 = explode(',', $latJson[1]);
        $data['lat'] = $latJson2[0];
        //Longitude
        $lonJson = explode('"lon":', $getApiJson);
        $lonJson2 = explode(',', $lonJson[1]);
        $data['lon'] = $lonJson2[0];
        //Timezone
        $timezoneJson = explode('"timezone":"', $getApiJson);
        $timezoneJson2 = explode('",', $timezoneJson[1]);
        $data['timezone'] = $timezoneJson2[0];
        //Internet Service Provider
        $ispJson = explode('"isp":"', $getApiJson);
        $ispJson2 = explode('",', $ispJson[1]);
        $data['isp'] = $ispJson2[0];
        //Org
        $orgJson = explode('"org":"', $getApiJson);
        $orgJson2 = explode('",', $orgJson[1]);
        $data['org'] = $orgJson2[0];
        //Autonomous System
        $asJson = explode('"as":"', $getApiJson);
        $asJson2 = explode('",', $asJson[1]);
        $data['as'] = $asJson2[0];
        //Query
        $queryJson = explode('"query":"', $getApiJson);
        $queryJson2 = explode('",', $queryJson[1]);
        $data['query'] = trim($queryJson2[0], '"}');

        return $data;
    }

    private function ipApiJsonGetMyIPAddress(): string
    {
        $getApiJson = @file_get_contents("http://ip-api.com/json/");

        if (!$getApiJson)
            throw new Exception("Connection error");

        //Query
        $queryJson = explode('"query":"', $getApiJson);
        $queryJson2 = explode('",', $queryJson[1]);

        return trim($queryJson2[0], '"}');
    }
}