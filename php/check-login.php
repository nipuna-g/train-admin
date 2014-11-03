<?php
/**
 * Created by PhpStorm.
 * User: nipuna
 * Date: 10/23/14
 * Time: 11:53 PM
 */

mysql_connect("localhost", "admin", "1admin") or die(mysql_error());
mysql_select_db("test") or die(mysql_error());

$result = mysql_query('SELECT * FROM traintracker_station WHERE station_id = 1');