<?php
session_start();
unset($_SESSION["ADMINID"]);
session_destroy();
header("location:index1.php");
?>