<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

session_start();
include 'connect.php';

$route_name = $_POST['route_name'];
$route_id = $_POST['route_id'];
$route_ari = $_POST['route_ari'];
$route_dep = $_POST['route_dep'];

$route_direction = $_SESSION['routeDirection'];

$query = "INSERT INTO `traintracker`.`traintracker_route` (`route_number`, `route_name`, `route_departure`, `route_arrival`,`route_direction`) VALUES ('$route_id', '$route_name', '$route_dep','$route_ari', '$route_direction');";
$result = mysqli_query($db, $query);
$_SESSION["route-id"] = mysqli_insert_id($db);
//echo mysqli_insert_id();

$insertName = "insert-route";
if($result) {
    //Save values in SESSION
    $_SESSION["insert-route"] = "Route Added";
}else{
    $_SESSION["insert-route"] = "Route Adding Failed";
}
echo $_SESSION["insert-route"];

//Redirect to payment method
//header('Location:../add-route.php');