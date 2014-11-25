<?php
//ini_set("display_errors", "1");

//error_reporting(E_ALL);

$username = "root";
$password = "test";
$hostname = "localhost";
$database = "traintracker";

$db = new mysqli($hostname, $username, $password, $database);

if($db ->connect_errno){
    echo $db -> connect_error;
    die('Database Connection Error');
}