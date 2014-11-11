<?php

//TODO: check if session has logged in
//if(!isset($_SESSION['login'])){
//    header('Location:login.php');
//}
$_SESSION['login-name'] = "Nipuna Gunathilake";

?>

<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
<!--    <div class="navbar-brand"><i class="fa fa-fw fa-user"></i></div>-->
    <a class="navbar-brand" href="/train-admin"><i class="fa fa-laptop"></i>&nbsp;Train Tracker Admin</a>
</div>
<!-- Top Menu Items -->
<ul class="nav navbar-right top-nav" style="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'login.php'){echo 'display:none'; }else { echo ''; } ?>">

    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$_SESSION['login-name']?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>
</ul>