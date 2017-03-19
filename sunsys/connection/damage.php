<?php

define("HOST", "localhost");
define("PORT","798");
define("USER", "root");
define("PASSWORD", "root");
define("DB", "sundb");
define("MyTable", "damages");

$connection = mysqli_connect(HOST, USER, PASSWORD, DB ,PORT) OR DIE("Impossible to access to DB : " . mysqli_connect_error());

?>