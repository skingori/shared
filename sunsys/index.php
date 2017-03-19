<?php
// Inialize session
session_start();
// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userid']) && isset($_SESSION['category'])) {
      switch($_SESSION['category']) {
	  case 1:
		  header('location:login.php');//redirect to client page
        break;
		case 2:
		  header('location:login.php');//redirect to  page
        break;
		case 4:
		  header('location:login.php');//redirect to admin
        break;
		
      }
	  }else
	  {

header('Location:login.php');
}

?>