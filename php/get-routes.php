<?php
include 'connect.php';

//possible way to kill the db if there is an error and print the db error
//$result = $db->query("SELECT * FROM traintracker_station") or die($db->error);

//if result is success
if ($result = $db->query("SELECT * FROM traintracker_route")) {
    if ($result->num_rows) {

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            //echo "<br>". "<pre>".print_r($row)."</pre>";
            echo "<td>". $row['route_name']. "</td>";
            echo "<td>". $row['route_number']. "</td>";
            echo "<td>". $row['route_status']. "</td>";
            echo "<td>". $row['route_departure']. "</td>";
            echo "<td>". $row['route_arrival']. "</td>";
            echo "<td>". $row['route_train']. "</td>";
            echo "</tr>";
        }

        $result->free();
    }

} else {
    die($db->error);
}
