<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/header.php"; ?>
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
                    <h1>
                        Trains
                        <small>View Trains</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Train Details</h3>
                        </div>

                        <div id="station-table">
                            <table class="table">
                                <tr>
                                    <th>Train ID</th>
                                    <th>Train Name</th>
                                    <th>Longitude</th>
                                    <th>Latitude</th>
                                    <th>Train Status</th>
                                </tr>
                                <tbody>
                                <?php
                                include 'php/get-trains.php';
                                ?>
                                </tbody>
                            </table>
                        </div>
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

</body>

</html>
