<?php

include 'connect.php';

//escapes in order to top sql injection
//$name = $db->real_escape_string("Gampaha");

$station_name = $_POST['station_name'];
$station_lat = $_POST['station_lat'];
$station_lon = $_POST['station_lon'];
$station_pre = $_POST['station_pre'];

$setstation = $db->prepare("INSERT INTO traintracker_station (station_name, station_lat, station_lon, station_prev) VALUES (?, ?, ?, ?) ");
$setstation->bind_param('ssss', $station_name, $station_lat, $station_lon, $station_pre);
$setstation->execute();

if ($result = $db->query("INSERT INTO traintracker_station (station_name) VALUES ('Gampaha') ")) {
    echo $db->affected_rows;
}

