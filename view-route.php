<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/header.php"; ?>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <?php include "php/header-nav.php"; include "php/sidebar-nav.php"; ?>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1>
                        Routes
                        <small>View Routes</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Routes Details</h3>
                        </div>

                        <div id="station-table">
                            <table class="table">
                                <tr>
                                    <th>Station</th>
                                    <th>Previous</th>
                                    <th>longitude</th>
                                    <th>latitude</th>
                                </tr>
                                <tbody>
                                <?php
                                include 'php/get-routes.php';
                                ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
            <!-- /.row -->
            <!-- /.col-sm-4 -->
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
