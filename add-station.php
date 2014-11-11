<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/header.php"; ?>

    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
        var map;
        function initialize() {
            var mapCanvas = document.getElementById('map_canvas');
            var mapOptions = {
                center: new google.maps.LatLng(6.933467, 80.0),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            map = new google.maps.Map(mapCanvas, mapOptions);

            google.maps.event.addListener(map, 'click', function (event) {
                $('#lat').val(event.latLng.lat());
                $('#lon').val(event.latLng.lng());

            });
        }

        google.maps.event.addDomListener(window, 'load', initialize);


    </script>


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
                        Station
                        <small>Add Station</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Station Details</h3>
                        </div>

                        <form class="form-horizontal" action="php/insertStation.php" method="post">
                            <fieldset>
                                <br>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Station Name</label>

                                    <div class="col-sm-6 col-md-6">
                                        <input id="textinput" name="station_name" type="text" placeholder=""
                                               class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Latitude</label>

                                    <div class="col-md-6">
                                        <input id="lat" name="station_lat" type="text" placeholder=""
                                               class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Longitude</label>

                                    <div class="col-md-6">
                                        <input id="lon" name="station_lon" type="text" placeholder=""
                                               class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Previous Station</label>

                                    <div class="col-md-6">
                                        <select name="station_pre" class="form-control">
                                            <?php
                                            include 'php/get-prev-station.php';
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <input type="submit" class="btn btn-primary"/>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- /.col-sm-5 -->
                <div class="col-sm-7">
                    <div class="panel panel-default">

                        <div id="map_canvas" style="height:500px;"></div>

                    </div>
                </div>
            </div>
            <!-- /.row -->
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

<script type="text/javascript">
    var markerPrev;
    $.get('php/get-station.json.php', function (data) {
        var obj = jQuery.parseJSON(data);
        $.each(obj , function (i, station) {

            var myLatlng = new google.maps.LatLng(station.station_lat,station.station_lon);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: station.station_name
            });

            var contentString = '<div style="width: 250px;color: rgba(3, 0, 74, 0.99);font-size:20px;font-family:Arial, Helvetica, sans-serif;">'+ station.station_name+'<br/>'+station.station_lat+'<br/>'+station.station_lon+'<br/>'+station.station_prev+'</div>';
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.close(map,markerPrev);
                infowindow.open(map,marker);
                markerPrev = marker;
            });
        });
    });
</script>

</body>

</html>
