<?php

$server="localhost";
$user="root";
$pass="";
$db="animal";

$con=mysqli_connect($server,$user,$pass,$db);

if($con)
	echo " ";
else
echo "no connection";

?>