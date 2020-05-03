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
        <p><a href="profile.php">
            <!-- <img src="static/images/icons/cat.png" alt=""> -->
            <span>Your Cats</span>
        </a></p>
        <p><a href="viewpotentials.php">Look for dates</a></p>
        <p id="cmiyc">Cat Me If You Can</p>
        <p><a href="matches.php">Matches</a></p>
        <p><a href="logout.php">Sign out</a></p>
</div>

    <div class="container">
        <div class="adminHead">
            <img class="headerPic" src="static/images/cutecat1.jpg" alt="">
            <div class="adminTitle">Admin<br>Dashboard</div>
        </div>
        <div class="adminContent">
            <div class="textBox adminContentItem">
            <a href="viewreports.php">
                <div class="adminContentItemHead">
                <p>
                    View Reports
                </p>
                </div>
                <p>View all reports of abuse from users.</p>
            </div>
            </a>
            <div class="textBox adminContentItem">
                <div class="adminContentItemHead">
                <p>
                    User Activity
                </p>
                </div>
                <p>View statistics on likes, matches, and number of users.</p>
            </div>
            <div class="textBox adminContentItem">
                <div class="adminContentItemHead">
                <p>
                    Manage Accounts
                </p>
                </div>
                <p>Remove or edit information on behalf of users.</p>
            </div>
           
</div>
</div>

</body>
</html>