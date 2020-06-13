<!-- /**
db_connect - creates the connection for the database
Versions 1.4
@authors Patrick Jones, Jack Dowling
 */ -->

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
if ($connect->connect_error) {
    die("Connection Failed : " . $connect->error);
}
?>