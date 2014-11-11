<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

session_start();
include 'connect.php';

$train_name = $_POST['train_name'];
$train_special = $_POST['train_special'];

$query = "INSERT INTO `traintracker`.`traintracker_train` (`train_id`, `train_name`, `train_special_name`) VALUES (NULL, '$train_name', '$train_special');";
$result = mysqli_query($db, $query);
$_SESSION['insert-train'] = "Train Added Successfully";

$insertName = "insert-train";
if($result) {
    //Save values in SESSION
    $_SESSION[$insertName] = "Train {$train_name} Added Successfully";
}else{
    $_SESSION[$insertName] = "Train Adding Failed";
}

//Redirect to payment method
header('Location:../add-route.php');