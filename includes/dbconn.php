<?php
include 'config.php';

// DB connection

$server = "localhost";
$user = useNM;
$password = pwd;
$dbname = dbnm;

// Create connection
$conn = mysqli_connect($server, $user, $password, $dbname);



// Check to see if connection works

// if(!$conn) {
//     echo 'Connection error: ' . mysqli_connect_error();
// }else{
//     echo 'Connection successful';
// }