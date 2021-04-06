<?php
$hostname = "localhost";
$user_name = "root";
$password = "";
$db = "cva";
$con = mysqli_connect($hostname,$user_name,$password,$db) or die('Unable to connect. Check your connection parameters.');
mysqli_select_db($con,'cva') or die(mysqli_error($db));
?>