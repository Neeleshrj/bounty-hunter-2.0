<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname   ="bounthunt";
$con=mysqli_connect($servername,$username,$password) or die("Unable to connect");
mysqli_select_db($con,$dbname);

?>