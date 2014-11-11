<?php

include 'connect.php';

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
