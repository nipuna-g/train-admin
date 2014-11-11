<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
session_start();

include 'connect.php';

$startStation = $_GET['start'];
$endStation = $_GET['end'];

$lowest;
$highest;
$prevStation;

if (intval($startStation) > intval($endStation)) {
    //train going up towards fort
    $highest = $endStation;
    $lowest = $startStation;
    $_SESSION['routeDirection'] = "up";
} else {
    //train going down
    $highest = $startStation;
    $lowest = $endStation;
    $_SESSION['routeDirection'] = "down";
}

$query = "SELECT * FROM traintracker_station WHERE station_id = '$endStation'";
$result = mysqli_query($db, $query);

while ($row = mysqli_fetch_array($result)) {
    $stationName = $row["station_name"];
    $stationID = $row["station_id"];
    $prevStation = $row["station_prev"];

    echo "<div class=\"checkbox\"><label><input type=\"checkbox\" name=\"$stationID\" value=\"$stationID\" checked>$stationName</label></div>";
}

$count = 0;
while ($prevStation != $lowest && $count<50) {
    $query = "SELECT * FROM traintracker_station WHERE station_id = '$prevStation'";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array($result)) {
        $stationName = $row["station_name"];
        $stationID = $row["station_id"];
        $prevStation = $row["station_prev"];
        echo "<div class=\"checkbox\"><label><input type=\"checkbox\" name=\"$stationID\" value=\"$stationID\" checked>$stationName</label></div>";
    }
    $count++;
}
