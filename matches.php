<?php 
// This will need to retrieve a profile of a potential match, not the user.

require_once 'init.php';
global $connect;

 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();

 $id=$row["id"];
 $picture=$row["picture"];
 $name=$row["name"];
 $gender=$row["gender"];
 $playful=$row["playful"];
 $angry=$row["angry"];
 $somber=$row["somber"];
 $independent=$row["independent"];
 $cuddly=$row["cuddly"];
 $likes=$row["likes"];
 $dislikes=$row["dislikes"];
 $location=$row["location"];

 $yes = "yes";

 $sql = "SELECT profile.id, profile.userid, profile.name, profile.gender, profile.playful, profile.angry, profile.somber, profile.independent, profile.cuddly, profile.likes, profile.dislikes, profile.location, matches.catid, matches.id, matches.catmatch, matches.matched, profile.picture
 FROM profile
 INNER JOIN matches ON profile.id=matches.catid WHERE catid = '$id' AND matched = '$yes'";
 $query2 = $connect->query($sql);
 
//  $id2=$row2["id"];
//  $picture2=$row2["picture"];
//  $name2=$row2["name"];
//  $gender2=$row2["gender"];
//  $playful2=$row2["playful"];
//  $angry2=$row2["angry"];
//  $somber2=$row2["somber"];
//  $independent2=$row2["independent"];
//  $cuddly2=$row2["cuddly"];
//  $likes2=$row2["likes"];
//  $dislikes2=$row2["dislikes"];
//  $location2=$row2["location"];

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <title>Find A Match</title>
</head>
<body>
    <div class="container">
        <div id="logo">
            <img src="static/images/logo.png" alt="">
            </div>
            <h1>Matches</h1>
        <div class="matches">
        
        <?php 
        if ($query2->num_rows > 0) {
    // output data of each row
    while($row2 = $query2->fetch_assoc()) {
        ?>
        <div class="match">
                <?php
                
                $sql2 = "SELECT profile.id, profile.userid, profile.name, profile.gender, profile.playful, profile.angry, profile.somber, profile.independent, profile.cuddly, profile.likes, profile.dislikes, profile.location, matches.catid, matches.id, matches.catmatch, matches.matched, profile.picture
                FROM profile
                INNER JOIN matches ON profile.id=matches.catid";
                $query3 = $connect->query($sql2);
                $row3 = $query3->fetch_assoc();

                 $id3=$row3["id"];
                 $picture3=$row3["picture"];
                 $name3=$row3["name"];
                 $gender3=$row3["gender"];
                 $playful3=$row3["playful"];
                 $angry3=$row3["angry"];
                 $somber3=$row3["somber"];
                 $independent3=$row3["independent"];
                 $cuddly3=$row3["cuddly"];
                 $likes3=$row3["likes"];
                 $dislikes3=$row3["dislikes"];
                 $location3=$row3["location"];

                ?>
                <!-- Match's profile pic -->
                <img src="static/images/logo.png" alt="">
                <!-- Match's name -->
                <p class="matchName"><?php echo "id: " . $row2["catmatch"] . $row3["name"];?></p>
                
            </div>
            <?php
        }
        } else {
        echo "0 results";
        }
        ?>
            <div class="match">
                <!-- Match's profile pic -->
                <img src="static/images/logo.png" alt="">
                <!-- Match's name -->
                <p class="matchName">Bobby Lofts</p>
            </div>
            <div class="match">
                <!-- Match's profile pic -->
                <img src="static/images/logo.png" alt="">
                <!-- Match's name -->
                <p class="matchName">Bobby Lofts</p>
            </div>
            <div class="match">
                <!-- Match's profile pic -->
                <img src="static/images/logo.png" alt="">
                <!-- Match's name -->
                <p class="matchName">Bobby Lofts</p>
            </div>
            <div class="match">
                <!-- Match's profile pic -->
                <img src="static/images/logo.png" alt="">
                <!-- Match's name -->
                <p class="matchName">Bobby Lofts</p>
            </div>
            <div class="match">
                <!-- Match's profile pic -->
                <img src="static/images/logo.png" alt="">
                <!-- Match's name -->
                <p class="matchName">Bobby Lofts</p>
            </div>
            <div class="match">
                <!-- Match's profile pic -->
                <img src="static/images/logo.png" alt="">
                <!-- Match's name -->
                <p class="matchName">Bobby Lofts</p>
            </div>
        </div>

    </div>
</body>
</html>