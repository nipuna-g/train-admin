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
                                <th>Train No</th>
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


<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <form class="form-horizontal" role="form" id="update_Form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Edit Train</h4>
                </div>
                <div class="modal-body col-sm-offset-1">

                    <input type="hidden" name="inputJob" value="update_train">
                    <input type="hidden" name="inputTrain_ID" id="inputTrain_ID">

                    <div class="form-group">
                        <div class="col-xs-4 col-sm-4">
                            <label for="inputTrain_Stat">Train Status</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputTrain_Stat" name="inputTrain_Stat"
                                   placeholder="" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-4 col-sm-4">
                            <label for="inputTrain_Stat">Train Status</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputTrain_No" name="inputTrain_No"
                                   placeholder="" required autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-4 col-sm-4">
                            <label for="inputTrain_Name">Train Name</label>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="inputTrain_Name" name="inputTrain_Name"
                                   placeholder="" required>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--Modal Edit End-->

<!-- Modal Delete Start -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="form-horizontal" role="form" id="contractorFormDelete">
            <div class="modal-content col-sm-8">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Delete Train</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="inputJob" value="delete_train">

                    <p>Are you sure you want to delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger delete_button">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!--Modal Delete End-->


<!---------------MODAL EDIT------------------------!>


</div>
<!-- /#wrapper -->

<!-- jQuery Version 1.11.0 -->
<script src="js/jquery-1.11.0.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<script>
    $(document).ready(function () {
        var selectedRow;
        var col;
        var row;

        $('tr').click(function () {
            $('tr').removeClass('selected');
            $(this).addClass('selected');

            selectedRow = $(this);
        });

        $('td').click(function () {
            col = $(this).parent().children().index($(this));
            row = $(this).parent().parent().children().index($(this).parent());
//                    alert('Row: ' + row + ', Column: ' + col);
        });

        $(".update_button").click(function () {
            console.log(selectedRow); //just to see what the row looks like
            var td = selectedRow.children('td');
//            for (var i = 0; i < td.length; ++i) {
//                alert(i + ': ' + td.eq(i).text());
//            }
            var inputTrain_ID = td.eq(0).text();
            var inputTrain_Name = td.eq(1).text();
            var inputTrain_Lat = td.eq(2).text();
            var inputTrain_Lon = td.eq(3).text();
            var inputTrain_Stat = td.eq(4).text();
            var inputTrain_No = td.eq(5).text();

            $("#inputTrain_ID").val(inputTrain_ID);
            $("#inputTrain_Name").val(inputTrain_Name);
            $("#inputTrain_Lat").val(inputTrain_Lat);
            $("#inputTrain_Lon").val(inputTrain_Lon);
            $("#inputTrain_Stat").val(inputTrain_Stat);
            $("#inputTrain_No").val(inputTrain_No);

        });
//      var request;

        $("#update_Form").submit(function (event) {

//            if (request) {
//                request.abort();
//            }

            var $form = $(this);
            var $inputs = $form.find("input, select, button, textarea");
            var serializedData = $form.serialize();
            $inputs.prop("disabled", true);

            request = $.ajax({
                url: "php/update.php",
                type: "post",
                data: serializedData
            });

            request.done(function (response, textStatus, jqXHR) {
                alert("Update Successful");
                location.reload();
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
                alert("failed");
                update_Alert_Server_Fail();
                console.error(
                    "The following error occured: " +
                    textStatus, errorThrown
                );
            });
            request.always(function () {
//                        alert("test enabled");
                $inputs.prop("disabled", false);
            });
            event.preventDefault();
        });

        $(".delete_button").click(function () {
            console.log(selectedRow);
            var td = selectedRow.children('td');

            var inputJob = "delete_train";
            var train_ID = td.eq(0).text();

            var $form = $(this);
            var $inputs = $form.find("input, select, button, textarea");
            var serializedData = $form.serialize();
            $inputs.prop("disabled", true);

            request = $.ajax({
                url: "php/delete.php",
                type: "post",
                data: {inputJob: inputJob, train_ID: train_ID}
            });

            request.done(function (response, textStatus, jqXHR) {
                console.log("Hooray, it worked!" + response);

                alert("Record Deleted")

                location.reload();
            });

            request.fail(function (jqXHR, textStatus, errorThrown) {
                delete_Alert_Server_Fail();
                console.error(
                    "The following error occured: " +
                    textStatus, errorThrown
                );
            });
            request.always(function () {
                $inputs.prop("disabled", false);
            });
            event.preventDefault();
        });
    });

</script>
<style>
    table, td {
        /*border: 1px solid black;*/
    }

    .selected {
        background-color: lightgray;
    }
</style>


<!--////////////////////////////////////////////////-->

</body>

</html>
