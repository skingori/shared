
<?php
//including the database connection file
include_once("login/connection/mysqlicon.php");

if(isset($_POST['clockin'])) {
    $employeenumber = $_POST['employeenumber'];

    // checking empty fields
    if(empty($employeenumber)) {

        if(empty($employeenumber)) {
            echo "<font color='red'>Enter Personal number</font><br/>";
        }

        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        // if all the fields are filled (not empty)

        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO attendance_table(employee_attendance_number ,employee_attendance_date ,employee_attendance_timeout) VALUES('$employeenumber' , now() ,now())");

        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";

        
    }
}
?>