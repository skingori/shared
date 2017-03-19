<?php

define("HOST", "localhost");
define("USER", "root");
define("PASSWORD", "root");
define("DB", "sundb");
define("MyTable", "policy");

$connection = mysqli_connect(HOST, USER, PASSWORD, DB) OR DIE("Impossible to access to DB : " . mysqli_connect_error());

?>