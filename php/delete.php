<?php

include 'connect.php';

session_start();

$job = $_POST['inputJob'];

if ($job) {
    if ($job == "delete_train") {
        $train_id = $_POST['train_ID'];

        $sql = "DELETE FROM `traintracker`.`traintracker_train` WHERE `traintracker_train`.`train_id` = $train_id;";

        if (mysqli_query($db, $sql)) {
            echo "Record delete successfully";
        } else {
            echo "Error delete record: " . mysqli_error($db);
        }

    }

    if ($job == "delete_station") {
        $id = $_POST['id'];

        $sql = "DELETE FROM `traintracker_station` WHERE `station_id` = '$id';";
        echo $sql;

        if (mysqli_query($db, $sql)) {
            echo "Record delete successfully";
        } else {
            echo "Error delete record: " . mysqli_error($db);
        }

    }

    if ($job == "delete_route") {
        $id = $_POST['id'];

        $sql = "DELETE FROM `traintracker_route` WHERE `route_id` = '$id';";
        echo $sql;

        if (mysqli_query($db, $sql)) {
            echo "Record delete successfully";
        } else {
            echo "Error delete record: " . mysqli_error($db);
        }

    }

}