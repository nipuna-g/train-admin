<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

session_start();
include 'connect.php';

$station_id = $_POST['station_id'];
//$station_id = 21;
$route_id = $_SESSION["route-id"];
//$route_id = 1;
$arival_time = $_POST["time"];
echo $_SESSION["route-id"];

$route_direction = $_SESSION['routeDirection'];

$query = "INSERT INTO `traintracker`.`traintracker_route_station` (`route`, `station_id`, `route_arival_time`) VALUES ('$route_id', '$station_id', '$arival_time')";
$result = mysqli_query($db, $query);


//Redirect to payment method
//header('Location:../add-route.php');