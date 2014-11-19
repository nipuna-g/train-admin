<?php

include 'connect.php';

if ($result = $db->query("SELECT * FROM traintracker_train")) {
    if ($result->num_rows) {


        while($row = $result->fetch_assoc()) {

            echo "<option value='{$row['train_id']}' >". $row['train_name']. "</option>";
//            echo "<td>". $row['train_special_name']. "</td>";
//            echo "<td>". $row['train_lon']. "</td>";
//            echo "<td>". $row['train_lat']. "</td>";
//            echo "<td>". $row['train_status']. "</td>";

        }

        $result->free();
    }

} else {
    die($db->error);
}
