<?php

include 'connect.php';

$stationArray = array();

if ($result = $db->query("SELECT * FROM traintracker_station")) {
    if ($result->num_rows) {
        while($row = $result->fetch_assoc()) {
            array_push($stationArray, $row);
        }
        $result->free();
    }

    $jsonStations = json_encode($stationArray);
    echo $jsonStations;

} else {
    die($db->error);
}
