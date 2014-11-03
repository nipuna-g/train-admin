<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'active'; }else { echo ''; } ?>">
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>

        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-map-marker"></i> Station <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="<?php if(basename($_SERVER['SCRIPT_NAME']) != 'add-station.php' && basename($_SERVER['SCRIPT_NAME']) != 'view-station.php'){echo 'collapse'; }else { echo ''; } ?>">
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
        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'charts.php'){echo 'active'; }else { echo ''; } ?>">
            <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
        </li>
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