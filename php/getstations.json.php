<?php
include 'connect.php';

//possible way to kill the db if there is an error and print the db error
//$result = $db->query("SELECT * FROM traintracker_station") or die($db->error);

//if result is success
if ($result = $db->query("SELECT * FROM traintracker_station")) {
    if ($result->num_rows) {

        $stationArray = array();
        while($row = $result->fetch_assoc()) {
            array_push($stationArray,$row);
        }
        echo json_encode($stationArray);
        $result->free();
    }

} else {
    die($db->error);
}
