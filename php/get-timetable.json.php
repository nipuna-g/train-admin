<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

include 'connect.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');

$url = "http://railway.lankagate.gov.lk/train/searchTrain";
$startStation = 23;
$endStation = 61;
$today = date("Y-m-d");

if( isset($_POST['startStation']) && isset($_POST['endStation']))
{
    $startStation = $_POST['startStation'];
    $endStation = $_POST['endStation'];
}

$searchParams = array(
    "endStationID" => "$endStation",
    "startStationID" => "$startStation",
    "searchDate" => "$today",
    "startTime" => "00:00:01",
    "endTime" => "23:59:59",
    "lang" => "en");

$result = CallAPI("GET", $url, $searchParams);
echo $result;

$response = json_decode($result, true);

function CallAPI($method, $url, $data = false)
{
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);

    curl_close($curl);

    return $result;
}