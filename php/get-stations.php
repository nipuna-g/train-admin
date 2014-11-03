<?php
/**
 * Created by PhpStorm.
 * User: nipuna
 * Date: 10/25/14
 * Time: 3:30 PM
 */

include 'connect.php';

//possible way to kill the db if there is an error and print the db error
//$result = $db->query("SELECT * FROM traintracker_station") or die($db->error);

//if result is success
if ($result = $db->query("SELECT * FROM traintracker_station")) {
    if ($result->num_rows) {

        //$rows = $result->fetch_assoc();

        //Requires MySQL Native Driver (mysqlnd).
        //$rows = $result->fetch_all(MYSQLI_ASSOC);

//        foreach($rows as $row){
//            echo print_r($row);
//        }

        // output data of each row


        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            //echo "<br>". "<pre>".print_r($row)."</pre>";
            echo "<td>". $row['station_name']. "</td>";
            echo "<td>". $row['station_prev']. "</td>";
            echo "<td>". $row['station_lon']. "</td>";
            echo "<td>". $row['station_lat']. "</td>";
            echo "</tr>";
        }

        $result->free();
    }

} else {
    die($db->error);
}
