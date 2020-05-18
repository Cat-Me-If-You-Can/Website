/**
profile - shows user profile  
Versions 1.4
@authors Patrick Jones, Jake Cleland
 */


<?php 
require_once 'init.php';
global $connect;
echo $_SESSION['id'];
//gets data from cat which is logged in to then display profile data
 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();

 if(isset($row["name"])){
 $picture=$row["picture"];
 $name=$row["name"];
 $bio=$row["bio"];
 $gender=$row["gender"];
 $playful=$row["playful"];
 $angry=$row["angry"];
 $somber=$row["somber"];
 $independent=$row["independent"];
 $cuddly=$row["cuddly"];
 $likes=$row["likes"];
 $dislikes=$row["dislikes"];
 $location=$row["location"];
} else {
 $picture=null;
 $name=null;
 $bio=null;
 $gender=null;
 $playful=null;
 $angry=null;
 $somber=null;
 $independent=null;
 $cuddly=null;
 $likes=null;
 $dislikes=null;
 $location=null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your profile</title>
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
        <div class="profileHead">
            <img class="headerPic" src="static/images/cutecat1.jpg" alt="catpic">
            <div class="profileTitle">Your<br>Profile</div>
        
        <div class="profileDesc">
            <p>This is where you put all the info about your cat.</p>
            <p>Done here? <a class="keylink" href="viewpotentials.php">Start meeting new cats!</a></p>
        </div>
    </div>

        <div class="profileInfoBox">
            <div class="profileHeader">
                <div class="profileName"><?php echo $name;?></div>
                <div class="profilePic">
                <?php    
                    if($picture == true){
                        ?><div id="ppcontainer">
                        <img class="profilePic" src="static/images/<?php echo $picture;?>" alt="Profile Picture">
                        </div> <?php
                    } else {
                        ?><div id="ppcontainer">
                        <img class="profilePic" src="images/blankprofile2.PNG">
                        </div> <?php
                    }
                    //Gets profile info of cat logged in
                    ?>
                </div>
            </div>
            <div class="profileSubhead"><p>Bio</p></div>
            <div class="profileInfo">
                <p><?php echo $bio;?></p>
            </div>
            <div class="profileSubhead"><p>Personality</p></div>
            <div class="profileInfo">   
                <p class="personality">Playful: <?php echo getTraitLevel($playful);?>&nbsp;</p><div class="barBack"><div class="barFront" style="width:<?php echo $playful;?>%"></div></div>
                <p class="personality">Angry: <?php echo getTraitLevel($angry);?>&nbsp;</p><div class="barBack"><div class="barFront" style="width:<?php echo $angry;?>%"></div></div>
                <p class="personality">Somber: <?php echo getTraitLevel($somber);?>&nbsp;</p><div class="barBack"><div class="barFront" style="width:<?php echo $somber;?>%"></div></div>
                <p class="personality">Independent: <?php echo getTraitLevel($independent);?>&nbsp;</p><div class="barBack"><div class="barFront" style="width:<?php echo $independent;?>%"></div></div>
                <p class="personality">Cuddly: <?php echo getTraitLevel($cuddly);?>&nbsp;</p><div class="barBack"><div class="barFront" style="width:<?php echo $cuddly;?>%"></div></div>
            </div>

            <div class="profileSubhead"><p>Likes</p></div>
            <div class="profileInfo">
                <p><?php echo $likes;?></p>
            </div>

            <div class="profileSubhead"><p>Dislikes</p></div>
            <div class="profileInfo">
                <p><?php echo $dislikes;?></p>
            </div>

            <div class="profileSubhead"><p>Suburb</p></div>
            <div class="profileInfo">
                <p><?php echo $location;?></p>
            </div>

            <!-- button to edit current profile -->
                <input type="button" class="pillButton" value="Edit Profile" onclick="window.location.href = 'editprofile.php';">
            
        </div>



    </div>
    
</body>
</html>
