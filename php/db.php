<?php
$username = "root";
$password = "test";
$hostname = "localhost"; 
$database = "traintracker";

//connection to the database
$con = mysql_connect($hostname, $username, $password, $database)
  or die("Unable to connect to MySQL");
