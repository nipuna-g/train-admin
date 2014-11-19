<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);

session_start();
include 'connect.php';

$train_id = $_POST['train_id'];
$route_id = $_POST['route_id'];
$first_station;
$second_station;

//function to calculate distance
function distanceGeoPoints($lat1, $lng1, $lat2, $lng2)
{

    $earthRadius = 3958.75;

    $dLat = deg2rad($lat2 - $lat1);
    $dLng = deg2rad($lng2 - $lng1);


    $a = sin($dLat / 2) * sin($dLat / 2) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
        sin($dLng / 2) * sin($dLng / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $dist = $earthRadius * $c;

    // from miles
    $meterConversion = 1609;
    $geopointDistance = $dist * $meterConversion;

    return $geopointDistance;
}

//get station result by
function getStationFromID($stationID, $db)
{
    $query = "SELECT * FROM `traintracker_station` WHERE `station_id`= {$stationID} LIMIT 0,1";
    $station_result = mysqli_query($db, $query);
    $station = mysqli_fetch_assoc($station_result);
    return $station;
}

function setDistance($db, $distance, $routeID, $stationID)
{
    $query = "UPDATE `traintracker_route_station` SET `distance` = {$distance} WHERE `station_id` = {$stationID} AND `route` = {$routeID}";
    $result = mysqli_query($db, $query);
}

if ($result = $db->query("SELECT * FROM `traintracker_route_station` WHERE `route`= {$route_id}")) {

    if ($result->num_rows) {
        $number = $result->num_rows;
        $i = 1;
        $station_prev;

        $current_lat;
        $current_lon;

        $previous_lat;
        $previous_lon;

        while ($row = $result->fetch_assoc()) {

            //For the first station
            if ($i == 1) {
                //set the first station
                $first_station = $row['station_id'];

                //get station object by using the station ID
                $station = getStationFromID($row['station_id'], $db);

                //set the initial latitude and longitude
                $previous_lat = $station["station_lat"];
                $previous_lon = $station["station_lon"];

                //add to array station_list..?
                $station_prev = $first_station;

                //For the second station
            }
            if ($i == 2) {
                $second_station = $row['station_id'];
                //get geo location and save it in loc_prev
                $station = getStationFromID($row['station_id'], $db);

                $current_lat = $station["station_lat"];
                $current_lon = $station["station_lon"];

                //calculate distance
                $distance = distanceGeoPoints($previous_lat, $previous_lon, $current_lat, $current_lon);

                //TODO: save distance to route table
                setDistance($db, $distance, $route_id, $row['station_id']);

                //For the last station
                //}else if($i==$number){
                //for the last
                //identify
                //For all other stations
            } else {
                //After the second station

                //set previous location

                $previous_lat = $current_lat;
                $previous_lon = $current_lon;

                //set the loc_current
                $station = getStationFromID($row['station_id'], $db);
                $current_lat = $station["station_lat"];
                $current_lon = $station["station_lon"];

                //calculate distance from last station
                $distance = distanceGeoPoints($previous_lat, $previous_lon, $current_lat, $current_lon);

                //TODO: save distance to route table
                setDistance($db, $distance, $route_id, $row['station_id']);
            }
            $i++;
        }
        $result->free();
    }

} else {
    die($db->error);
}

$query = "UPDATE `traintracker_route` SET `route_train`= {$train_id}, `route_station`= {$first_station}, `route_next`= {$second_station} WHERE `route_id`= {$route_id}";
$result = mysqli_query($db, $query);

if ($result) {
    //Save values in SESSION
    $_SESSION["set-route"] = "Route Train Added";
} else {

    $_SESSION["set-route"] = "Train Adding Failed";
    echo mysqli_error($db);
}
echo $_SESSION["set-route"];

//Redirect to payment method
//header('Location:../add-route.php');