<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/header.php"; ?>

    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="js/moment.js"></script>

    <?php

    session_start();
    include 'php/connect.php';


    $insertName = 'insert-route';
    //----START-----check if insert is set
    if (!isset($_SESSION[$insertName]) || $_SESSION[$insertName] == '') {
        //Do nothing if insert is not set
    } else {
        $insert_status = $_SESSION[$insertName];
        $_SESSION[$insertName] = '';
        ?>
        <script>
            alert("<?php echo $insert_status ?>");
        </script>

    <?php
    }
    //----END-----check if insert is set
    ?>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include "php/header-nav.php";
        include "php/sidebar-nav.php"; ?>
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="">
                        Train
                        <small>Add Train</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Start End Stations</h3>
                        </div>

                        <form id="selectStations" class="form-horizontal" action="" method="post">
                            <fieldset>
                                <br>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Start Station</label>

                                    <select id="start-station" class="form-control" style="width:200px;">
                                        <?php
                                        include 'php/get-prev-station.php';
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">End Station</label>

                                    <select id="end-station" class="form-control" style="width:200px;">
                                        <?php
                                        include 'php/get-prev-station.php';
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-primary" value="Get Stations"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- /.col-sm-5 -->

                <div class="col-sm-7">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Select Stations</h3>
                        </div>

                        <form class="form-horizontal" action="php/insertRoute.php" method="post">
                            <fieldset>
                                <br>
                                <div id="station-list" class="checkbox-wrapper" style="margin-left: 20px">

                                </div>

<!--                                <div class="form-group">-->
<!--                                    <div class="col-md-12 text-center">-->
<!--                                        <input type="submit" class="btn btn-primary"/>-->
<!--                                    </div>-->
<!--                                </div>-->

                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- /.col-sm-7 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Route Details</h3>
                </div>

                <form id="submitDetails" class="form-horizontal" action="php/insertRoute.php" method="post">
                    <fieldset>
                        <br>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput">Route ID</label>

                            <div class="col-md-8">
                                <input required id="route-id" name="route_name" type="text" placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput">Route Name</label>

                            <div class="col-md-8">
                                <input required id="route-name" name="route_id" type="text" placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput">Route Departure</label>

                            <div class="col-md-8">
                                <input id="route-dep" name="route_departure" type="time" placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label" for="textinput">Route Arrival</label>

                            <div class="col-md-8">
                                <input id="route-ari" name="route_arrival" type="time" placeholder=""
                                       class="form-control input-md">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-primary"/>
                            </div>
                        </div>
                        <?php echo $_SESSION['insert-route'] ?>

                    </fieldset>
                </form>
            </div>
            </div>

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script>

    $('#selectStations').submit(function( event ) {
        var startStation = $("#start-station option:selected").val();
        var endStation = $("#end-station option:selected").val();
        $.get( "php/get-route-stations.php", { start: startStation, end: endStation } )
            .done(function( data ) {
                $("#station-list").html(data);
            });
        event.preventDefault();
    });

    $('#submitDetails').submit(function(event){
        var station = new Array();
        $('.station input:checked').each(function (i,obj) {
            station.push($(this).val());
        });

        event.preventDefault();

        var routeID = $('#route-id').val();
        var routeName = $('#route-name').val();
        var routeDep = $('#route-dep').val();
        var routeAri = $('#route-ari').val();

        alert(routeAri);

        //Add new route
        $.post( "php/insertRoute.php", { route_name: routeID, route_id: routeName, route_ari: routeAri, route_dep: routeDep} )
            .done(function( data ) {
                //var status = '<?php //echo $_SESSION['insert-route']; ?>';
                //alert("InsertRoute");
            });
        event.preventDefault();

        //TODO: Calculate times for each station
        var depTime = moment(routeDep,"HH:mm");
        var ariTime = moment(routeAri,"HH:mm");
        var duration = moment.duration(ariTime.diff(depTime));
        var min = duration.asMinutes();
        var scheduleTime = depTime;

        var timeDiff = min/station.length;
        //TODO: Add route-stations records for each
        $('.station input:checked').each(function (i,obj) {
            scheduleTime = moment(scheduleTime).add(timeDiff, 'minutes');
            //alert(scheduleTime);
            var newStation = $(this).val();
            station.push(newStation);

            var formatedTime = moment(scheduleTime).format('HH:mm:ss');
            //alert (formatedTime);

            //Add stations to route
            $.post( "php/insertRouteStation.php", { station_id: newStation, time: formatedTime} )
                .done(function( data ) {
                });
            //INSERT INTO `traintracker`.`traintracker_route_station` (`route`, `station_id`) VALUES ('1', '2')

        });

    });

</script>

</body>

</html>
