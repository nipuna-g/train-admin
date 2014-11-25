<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

session_start();
include "connect.php";

$userID = $_POST['username'];
$password = $_POST['password'];
$hashPass = md5($password);

$query = "SELECT * FROM traintracker_user WHERE user_username = '$userID' ";

$result = mysqli_query($db, $query);
$login = false;
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        echo "id: " . $row["user_username"] . " - Name: " . $row["user_name"] . " " . $row["user_password"] . "<br>";
        echo $hashPass;
        if($row["user_password"] == $hashPass){
            $login = true;
            //echo("Logged in successfully");
            $_SESSION['login'] = $userID;
            $_SESSION['login-name'] = $row["user_name"];
            header('Location:../index.php');
        }
    }
} else {
    header('Location:../login.php');
}

if (!$login) {
    header('Location:../login.php?login=failed');
}