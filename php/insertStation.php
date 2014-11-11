<?php

include 'connect.php';

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

//escapes in order to top sql injection
//$name = $db->real_escape_string("Gampaha");

$station_name = $_POST['station_name'];
$station_lat = $_POST['station_lat'];
$station_lon = $_POST['station_lon'];
$station_pre = $_POST['station_pre'];

$setstation = $db->prepare("INSERT INTO traintracker_station (station_name, station_lat, station_lon, station_prev) VALUES (?, ?, ?, ?) ");
$setstation->bind_param('ssss', $station_name, $station_lat, $station_lon, $station_pre);
//$setstation->execute();

$insertName = "insert-train";
if($setstation->execute()) {
    header('Location:../add-station.php');
    $_SESSION[$insertName] = "Train {$train_name} Added Successfully";
    die();
}else{
    $_SESSION[$insertName] = "Train Adding Failed";
    echo $setstation->error;
}

//Redirect to payment method
//header('Location:../add-station.php');