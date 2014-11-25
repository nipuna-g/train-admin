<?php
/**
 * Change current station and the ETA
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

include 'connect.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');

$stationList = $_POST['stationList'];
$route;
$timeNow = date('Y-m-d H:i:s');

foreach ($stationList as $station){
    $stationID = ($station["id"]);

    if ($result = $db->query("SELECT * FROM traintracker_route_station WHERE station_id=$stationID")) {
        if ($result->num_rows) {
            while($row = $result->fetch_assoc()) {
                $station = $row;
            }

            $route = $station['route'];
            //$time = date_format(strtotime($timeNow), 'Y-m-d H:i:s');

            $query = "UPDATE `traintracker_route_station` SET `route_arival_time`= '{$timeNow}' WHERE `route`= '{$route}' AND `station_id`='{$station['station_id']}'";
            //echo $query;
            $result = mysqli_query($db, $query) ;

            echo $timeNow;
            $dateTime = new DateTime($timeNow);
            $timeNow = strtotime("+15 minutes", $dateTime->getTimestamp());
            $timeNow = date('Y-m-d H:i:s', $timeNow);

            echo $timeNow;
        }
    } else {
        die($db->error);
    }
}


