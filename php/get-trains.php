<?php

include 'connect.php';

if ($result = $db->query("SELECT * FROM traintracker_train")) {
    if ($result->num_rows) {


        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            //echo "<br>". "<pre>".print_r($row)."</pre>";
            echo "<td>". $row['train_id']. "</td>";
            echo "<td>". $row['train_special_name']. "</td>";

            echo "<td>". $row['train_lon']. "</td>";
            echo "<td>". $row['train_lat']. "</td>";
            echo "<td>". $row['train_status']. "</td>";
            echo "<td>". $row['train_name']. "</td>";
            echo "<td><button type='button' class='btn update_button' data-toggle='modal' data-target='#editModal'> Edit</button></td>";
            echo "<td><button type='button' class='btn btn-warning'  data-toggle='modal' data-target='#deleteModal'> Delete</button></td>";
            echo "</tr>";
        }

        $result->free();
    }

} else {
    die($db->error);
}
