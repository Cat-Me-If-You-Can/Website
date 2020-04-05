<?php 
require_once 'init.php';
global $connect;

 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();

 $picture=$row["picture"];
 $name=$row["name"];
 $gender=$row["gender"];
 $personality1=$row["personality1"];
 $personality2=$row["personality2"];
 $personality3=$row["personality3"];
 $likes=$row["likes"];
 $dislikes=$row["dislikes"];
 $location=$row["location"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <title>View Profile</title>
</head>
<body>
    <div class="container">
        <div id="logo">
            <img src="static/images/logo.png" alt="">
            </div>
        <div class="profileDetails">
            
            <!-- If profile picture, load into src below -->
            <!-- If no profile picture, display white circle -->
            <?php
            if($picture == true){
                ?><div id="ppcontainer">
                <img id="profilepic" src="images/<?php echo $picture;?>" alt="Profile Picture">
                </div> <?php
            } else {
                ?><div id="uploadProfilePic"></div><?php
            }
            ?>		
            <div class="subheading">
            <p>Name</p>
            </div>
            <p><?php echo $name;?></p>
            <div class="subheading">
            <p>Personality</p>
            </div>
            <!-- if personalityTraits, GET personality traits, else <p>Add more personality traits for your cat!</p>-->
            <p><?php echo $personality1;?></p>
            <p><?php echo $personality2;?></p>
            <p><?php echo $personality3;?></p>
            <div class="subheading">
            <p>Likes</p>
            </div>
            <p><?php echo $likes;?></p>
            <div class="subheading">
            <p>Dislikes</p>
            </div>
            <p><?php echo $dislikes;?></p>
            <div class="subheading">
            <p>Location</p>
            </div>
            <p><?php echo $location;?></p>
            <button class="bottomButton" onclick="window.location.href = 'createprofile.html';">Edit Profile</button>
            
        </div>
    </div>
    <?php include 'navbar.php';?>
</body>
</html>