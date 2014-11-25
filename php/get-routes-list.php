<?php

include 'connect.php';

if ($result = $db->query("SELECT * FROM traintracker_route")) {
    if ($result->num_rows) {


        while($row = $result->fetch_assoc()) {
            echo "<option value='{$row['route_id']}' >". $row['route_name']. "</option>";
        }

        $result->free();
    }

} else {
    die($db->error);
}
