<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Zeeshan</title>
</head>

<body>
    <div class="jumbotron heading">
        <h1>On/Off Switch by Zeeshan</h1>
        <p class="lead">Home Automation</p>
    </div>

    <div class="container example">

        <div class="row myrow">

            <div class="col-6 vertical-center">
                <h6>Light 1</h6>
            </div>

            <div class="col-6">
                <form method="post" id="insert_data">

                    <div class="form-group">
                        <div class="checkbox">
                            <?php
                            include 'read.php';
                            if ($status[0] == "on") {
                                echo '<input type="checkbox" name="status" id="status" checked/>';
                            } else {
                                echo '<input type="checkbox" name="status" id="status" />';
                            }
                            ?>
                            <input type="hidden" name="hidden_status" id="hidden_status" value="on" />
                            <input type="submit" name="insert" id="action" class="btn btn-info hidebtn" value="Change Status" />
                        </div>

                    </div>

                </form>
            </div>
        </div>
        <div class="row myrow">

            <div class="col-6 vertical-center">
                <h6>Light 2</h6>
            </div>

            <div class="col-6">
                <form method="post" id="insert_data1">

                    <div class="form-group">
                        <div class="checkbox">
                            <?php
                            if ($status[1] == "on") {
                                echo '<input type="checkbox" name="status1" id="status1" checked/>';
                            } else {
                                echo '<input type="checkbox" name="status1" id="status1" />';
                            }
                            ?>
                            <input type="hidden" name="hidden_status1" id="hidden_status1" value="on" />
                            <input type="submit" name="insert1" id="action1" class="btn btn-info hidebtn" value="Change Status" />
                        </div>

                    </div>

                </form>
            </div>
        </div><!-- /.row -->
        <div class="row myrow">

            <div class="col-6 vertical-center">
                <h6>Light 3</h6>
            </div>

            <div class="col-6">
                <form method="post" id="insert_data2">

                    <div class="form-group">
                        <div class="checkbox">
                            <?php
                            if ($status[2] == "on") {
                                echo '<input type="checkbox" name="status2" id="status2" checked/>';
                            } else {
                                echo '<input type="checkbox" name="status2" id="status2" />';
                            }
                            ?>
                            <input type="hidden" name="hidden_status2" id="hidden_status2" value="on" />
                            <input type="submit" name="insert2" id="action2" class="btn btn-info hidebtn" value="Change Status" />
                        </div>

                    </div>

                </form>
            </div>
        </div><!-- /.row -->
        <div class="row myrow">

            <div class="col-6 vertical-center">
                <h6>Light 4</h6>
            </div>

            <div class="col-6">
                <form method="post" id="insert_data3">

                    <div class="form-group">
                        <div class="checkbox">
                            <?php
                            if ($status[3] == "on") {
                                echo '<input type="checkbox" name="status3" id="status3" checked/>';
                            } else {
                                echo '<input type="checkbox" name="status3" id="status3" />';
                            }
                            ?>
                            <input type="hidden" name="hidden_status3" id="hidden_status3" value="on" />
                            <input type="submit" name="insert3" id="action3" class="btn btn-info hidebtn" value="Change Status" />
                        </div>

                    </div>

                </form>
            </div>
        </div><!-- /.row -->

    </div><!-- /.container -->
</body>

</html>
<script src="app.js"></script>