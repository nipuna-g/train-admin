<!DOCTYPE html>
<html lang="en" style="height:100%">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>login form</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <script type="text/javascript"></script>
    <link rel='stylesheet' type='text/css' href='/B1D671CF-E532-4481-99AA-19F420D90332/netdefender/hui/ndhui.css' />
</head>

<body style="background-color:#e8e8e8; min-height:100%">
   

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
           
            <?php 
                include "php/header-nav.php";
            ?>
        </nav>

    <div class="container" style="position:absolute; top: calc(50% - 200px); width:100%">

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default align center">
                    <div class="panel-heading">
                        <h2 class="text-center">Login</h2>
                    </div>
                    <div class="panel-body">

                        <form role="form">
                            <form offset3>
                                <fieldset>
                                    <div class="form-group">
                                        <label>User Name</label>
                                        <input class="form-control" placeholder="User name" name="username" autofocus>
                                    </div>
<!--
                                    <div>
                                        <label>User Level</label>
                                        <select name="level" class="form-control">
                                            <option>Administrator-Planning</option>
                                            <option>Admin System</option>
                                            <option>Distributor Representative</option>
                                        </select>
                                    </div>
-->
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <input type="submit" href="index.html" class="btn btn-primary btn-block" value="Login">
                                    </a>
                                </fieldset>
                            </form>

                    </div>
                </div>
            </div>



        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
