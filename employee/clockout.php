<html>
<link href="login/css/loginback.css" rel="stylesheet">

<body>

<?php
//including the database connection file
include_once("login/connection/mysqlicon.php");

if(isset($_POST['clockin'])) {
    $employeenumber = $_POST['employeenumber'];

    // checking empty fields
    if(empty($employeenumber)) {

        if(empty($employeenumber)) {
            echo "<font color='red'>Enter Personal number</font><br/>";
            ?>
            <meta content="0;index.html?action=home" http-equiv="refresh" />

            <?php
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO attendance_table(employee_attendance_username ,employee_attendance_date ,employee_attendance_timeout) VALUES('$employeenumber' , now() ,now())");

        //display success messag

        ?>
        <meta content="0;index.html?action=home" http-equiv="refresh" />

        <?php

    }
}
?>

</body>

<!-- This beeps when wrong input -->
<audio id="audio" src="http://www.soundjay.com/button/beep-07.wav" autostart="false" ></audio>
<script>
var sound = document.getElementById("audio");
sound.play()

</script>

<!-- End of javascript -->

</html>

