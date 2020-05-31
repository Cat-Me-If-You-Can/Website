<!-- /**
Admindashboard - Provides admin functionality to the admin Dashboard
Versions 1.4
@author Jake Cleland
 */ -->


<?php 
require_once 'init.php';
global $connect;
echo $_SESSION['id'];

 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
<div class="header">
    <p><a href="viewreports.php">View Reports</a></p>
    <p><a href="useractivity.php">User Activity</a></p>
    <p id="cmiyc">Cat Me If You Can</p>
    <p><a href="../../phpMyAdmin/">Manage Accounts</a></p>
    <p><a href="logout.php">Sign out</a></p>
</div>

    <div class="container">
        <div class="adminHead">
            <img class="headerPic" src="static/images/cutecat1.jpg" alt="">
            <div class="adminTitle">Admin<br>Dashboard</div>
        </div>
        <div class="adminContent">
        <a href="viewreports.php">
            <div class="textBox adminContentItem">
                <div class="adminContentItemHead">
                <p>
                    View Reports
                </p>
                </div>
                <p>View all reports of abuse from users.</p>
            </div>
            </a>
            <div class="textBox adminContentItem">
            <a href="useractivity.php">
                <div class="adminContentItemHead">
                <p>
                    User Activity
                </p>
                </div>
                <p>View statistics on likes, matches, and number of users.</p>
            </div>
            </a>
            <a href="../phpmyadmin/">
            <div class="textBox adminContentItem">
                <div class="adminContentItemHead">
                <p>
                    Manage Accounts
                </p>
                </div>
                <p>Remove or edit information on behalf of users.</p>
            </div>
            </a>
           
</div>
</div>

</body>
</html>