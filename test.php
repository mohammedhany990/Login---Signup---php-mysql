<?php

$hostname = "localhost";
$username = "root";
$password = "";
$db = "formsinfo";

$con =mysqli_connect($hostname,$username,$password,$db );

if( $con ){
    echo "Connection successful";
}else {
    die(mysqli_error($con));
}








?>