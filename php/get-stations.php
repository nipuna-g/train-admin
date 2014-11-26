<?php
include 'connect.php';

if ($result = $db->query("SELECT * FROM traintracker_station")) {
    if ($result->num_rows) {

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            //echo "<br>". "<pre>".print_r($row)."</pre>";
            echo "<td>". $row['station_name']. "</td>";
            echo "<td>". $row['station_prev']. "</td>";
            echo "<td>". $row['station_lon']. "</td>";
            echo "<td>". $row['station_lat']. "</td>";
            echo "<td><button type='button' class='btn btn-warning'  data-toggle='modal' data-target='#deleteModal'> Delete</button></td>";

            echo "</tr>";
        }

        $result->free();
    }

} else {
    die($db->error);
}
