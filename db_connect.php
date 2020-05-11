<?php 
 

//server details

$servername = "localhost";
$email = "root";
$password = "";
$dbname = "login_registration";
 
// crearte connection
$connect = new Mysqli($servername, $email, $password, $dbname);
$link = mysqli_connect($servername, $email, $password, $dbname);
// check connection
if($connect->connect_error) {
    die("Connection Failed : " . $connect->error);
} else {
    // echo "Successfully Connected";   
}
 
?>

