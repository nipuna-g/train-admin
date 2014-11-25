<?php

include 'connect.php';
session_start();

$job = $_POST['inputJob'];

if ($job) {
    if ($job == "update_train") {
        $train_id = $_POST['inputTrain_ID'];
        $train_status = $_POST['inputTrain_Stat'];
        $train_no = $_POST['inputTrain_No'];
        $train_name = $_POST['inputTrain_Name'];

        $sql = "UPDATE `traintracker`.`traintracker_train` SET `train_status` = '$train_status', `train_name` = '$train_no', `train_special_name` = '$train_name' WHERE `traintracker_train`.`train_id` = '$train_id';";

        if (mysqli_query($db, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($db);
        }

    }
}