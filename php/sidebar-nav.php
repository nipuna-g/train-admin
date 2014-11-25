<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'active'; }else { echo ''; } ?>">
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#station-dropdown"><i class="fa fa-fw fa-map-marker"></i> Station <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="station-dropdown" class="<?php if(basename($_SERVER['SCRIPT_NAME']) != 'insertStation.php' && basename($_SERVER['SCRIPT_NAME']) != 'view-station.php'){echo 'collapse'; }else { echo ''; } ?>">
                <li>
                    <a href="add-station.php" style="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'add-station.php'){echo 'background:black'; }else { echo ''; } ?>">Add Station</a>
                </li>
<!--                <li>-->
<!--                    <a href="#">Edit Station</a>-->
<!--                </li>-->
                <li>
                    <a href="view-station.php" style="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'view-station.php'){echo 'background:black'; }else { echo ''; } ?>">View Stations</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#train-dropdown"><i class="fa fa-fw fa-plane"></i> Train <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="train-dropdown" class="<?php if(basename($_SERVER['SCRIPT_NAME']) != 'insertTrain.php' && basename($_SERVER['SCRIPT_NAME']) != 'view-train.php'){echo 'collapse'; }else { echo ''; } ?>">
                <li>
                    <a href="add-train.php" style="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'add-train.php'){echo 'background:black'; }else { echo ''; } ?>">Add Train</a>
                </li>
                <li>
                    <a href="view-train.php" style="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'view-train.php'){echo 'background:black'; }else { echo ''; } ?>">View Trains</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#route-dropdown"><i class="fa fa-fw fa-road"></i> Route <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="route-dropdown" class="<?php if(basename($_SERVER['SCRIPT_NAME']) != 'add-route.php' && basename($_SERVER['SCRIPT_NAME']) != 'view-route.php' && basename($_SERVER['SCRIPT_NAME']) != 'set-route.php'){echo 'collapse'; }else { echo ''; } ?>">
                <li>
                    <a href="add-route.php" style="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'add-route.php'){echo 'background:black'; }else { echo ''; } ?>">Add Route</a>
                </li>

                <li>
                    <a href="view-route.php" style="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'view-route.php'){echo 'background:black'; }else { echo ''; } ?>">View Routes</a>
                </li>

                <li>
                    <a href="set-route.php" style="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'set-route.php'){echo 'background:black'; }else { echo ''; } ?>">Set Route</a>
                </li>

            </ul>
        </li>

<!--        <li class="--><?php //if(basename($_SERVER['SCRIPT_NAME']) == 'charts.php'){echo 'active'; }else { echo ''; } ?><!--">-->
<!--            <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>-->
<!--        </li>-->
        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'time-table.php'){echo 'active'; }else { echo ''; } ?>">
            <a href="time-table.php"><i class="fa fa-fw fa-clock-o "></i> Time Table</a>
        </li>
<!--        <li class="--><?php //if(basename($_SERVER['SCRIPT_NAME']) == 'forms.php'){echo 'active'; }else { echo ''; } ?><!--">-->
<!--            <a href="forms.php"><i class="fa fa-fw fa-edit"></i> Forms</a>-->
<!--        </li>-->
<!--        <li class="--><?php //if(basename($_SERVER['SCRIPT_NAME']) == 'bootstrap-elements.php'){echo 'active'; }else { echo ''; } ?><!--">-->
<!--            <a href="bootstrap-elements.php"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>-->
<!--        </li>-->
<!--        <li class="--><?php //if(basename($_SERVER['SCRIPT_NAME']) == 'bootstrap-grid.php'){echo 'active'; }else { echo ''; } ?><!--">-->
<!--            <a href="bootstrap-grid.php"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>-->
<!--        </li>-->
<!---->
<!--        <li class="--><?php //if(basename($_SERVER['SCRIPT_NAME']) == 'blank-page.php'){echo 'active'; }else { echo ''; } ?><!--">-->
<!--            <a href="blank-page.php"><i class="fa fa-fw fa-file"></i> Blank Page</a>-->
<!--        </li>-->
    </ul>
</div>