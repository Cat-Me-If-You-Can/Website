<?php 
 
#will have to add these once i know the server 

$servername = "127.0.0.1";
$email = "root";
$password = "";
$dbname = "login_registration";
 
// crearte connection
$connect = new Mysqli($servername, $email, $password, $dbname);
 
// check connection
if($connect->connect_error) {
    die("Connection Failed : " . $connect->error);
} else {
    // echo "Successfully Connected";   
}
 
?>

