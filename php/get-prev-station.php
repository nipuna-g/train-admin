<?php

include 'connect.php';

if ($result = $db->query("SELECT * FROM traintracker_station")) {
    if ($result->num_rows) {
        while($row = $result->fetch_assoc()) {
            echo "<option>". $row['station_name']. "</option>";
        }
        $result->free();
    }

} else {
    die($db->error);
}
