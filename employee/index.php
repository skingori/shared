<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee || Login</title>

    <link href="login/css/bootstrap.min.css" rel="stylesheet">
    <link href="login/css/datepicker3.css" rel="stylesheet">
    <link href="login/css/styles.css" rel="stylesheet">
    <link href="login/css/scan.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="login/js/html5shiv.js"></script>
    <script src="login/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading" align="center"><img src="login/images/2.gif" /></div>
            <div class="panel-body">



                <!-- start of php coding-->

                    <form  method="POST" action="">
                        <div class="form-group" align="left">

                            <input type="text" class="form-control" placeholder="XXX-655-UII-7876-2016" name="employeenumber">
                        </div>


                        <div class="form-group" align="center">
                            <button type="submit" class="btn btn-primary btn-flat" value="clockin" formaction="clockin.php" name="clockin">Clock-In</button>
                            <button type="submit" class="btn btn-primary btn-flat" value="clockin" formaction="clockout.php" name="clockin">Clock-Out</button>
                        </div>



                    </form>

                </div>
                <!--end of php coding-->


            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->



<script src="login/js/jquery-1.11.1.min.js"></script>
<script src="login/js/bootstrap.min.js"></script>
<script src="login/js/chart.min.js"></script>
<script src="login/js/chart-data.js"></script>
<script src="login/js/easypiechart.js"></script>
<script src="login/js/easypiechart-data.js"></script>
<script src="login/js/bootstrap-datepicker.js"></script>
<script>
    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>
</body>

</html>
