<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "php/header.php"; ?>

    <script src="https://maps.googleapis.com/maps/api/js"></script>

    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(-1);

    session_start();
    include 'php/connect.php';


    $insertName = 'insert-train';
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
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Station Details</h3>
                        </div>

                        <form class="form-horizontal" action="php/insertTrain.php" method="post">
                            <fieldset>
                                <br>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Train ID</label>

                                    <div class="col-sm-6 col-md-6">
                                        <input id="textinput" name="train_name" type="text" placeholder="placeholder"
                                               class="form-control input-md">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="textinput">Train Name(Optional)</label>

                                    <div class="col-md-6">
                                        <input id="lat" name="train_special" type="text" placeholder="placeholder"
                                               class="form-control input-md">
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
