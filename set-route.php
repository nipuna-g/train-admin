<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/header.php"; ?>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(-1);

    //session_start();
    include 'php/connect.php';

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
                        Route
                        <small>Set Route</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Route Details</h3>
                        </div>

                        <form class="form-horizontal" action="php/setRoute.php" method="post">
                            <fieldset>
                                <br>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="routeSelect">Route ID</label>

                                    <div class="col-sm-6 col-md-6">
                                        <select id="routeSelect" name="route_id" type="text" placeholder="placeholder"
                                                class="form-control input-md">
                                            <?php include 'php/get-routes-list.php' ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="trainSelect">Train ID</label>

                                    <div class="col-md-6">
                                        <select id="trainSelect" name="train_id" type="text" placeholder="placeholder"
                                                class="form-control input-md">
                                            <?php include 'php/get-trains-list.php' ?>
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

</body>

</html>
