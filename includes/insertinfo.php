<?php 

// Includes DB connections file
include_once 'dbconn.php';


// Grabbing form information
if(isset($_POST['sendinfo'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);
    $make = mysqli_real_escape_string($conn, $_POST['make']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $vin = mysqli_real_escape_string($conn, $_POST['vin']);


// DB insert statement     
    $query = "INSERT INTO customer(firstName, lastName, address, phone, email, year, make, model, vin)
                VALUES('$fname', '$lname', '$address', '$phone', '$email', '$year', '$make', '$model', '$vin')";

// Running query from insert statement to DB connection 
    $run_query = mysqli_query($conn, $query);
    



    if($run_query) {
//  Alerts if submission is succeccful
        echo '<script> alert("Data Saved"); </script>';
//  Returns back to index page after from is submitted 
        header('location: ../index.php');
    }else {
//  Alerts if submission fails 
        echo '<script> alert("Data not Saved") </script>';
    }



    // if($run_query) {
    //     echo " Form submitted successfully";
    // }else {
    //     echo " Form not submitted";
    // }


}