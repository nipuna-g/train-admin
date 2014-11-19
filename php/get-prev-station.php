<?php

include 'connect.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');

if ($result = $db->query("SELECT * FROM traintracker_station")) {

    if ($result->num_rows) {
        $number = $result->num_rows;
        $i = 1;
        while($row = $result->fetch_assoc()) {
            if($i == $number){
                echo "<option value={$row['station_id']}>". $row['station_name']. "</option>";
            }else{
                echo "<option value={$row['station_id']}>". $row['station_name']. "</option>";
            }
            $i++;
        }
        $result->free();
    }

} else {
    die($db->error);
}
