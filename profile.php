<?php 
require_once 'init.php';
global $connect;
echo $_SESSION['id'];

 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();

 if(isset($row["name"])){
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
} else {
 $picture=null;
 $name=null;
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
        <p>Cat Me If You Can</p>
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
                <div class="profilePic"><img src="static/images/cutecat1.jpg" alt="profypic"></div>
            </div>
            <div class="profileSubhead"><p>Bio</p></div>
            <div class="profileInfo">
                <p><?php echo $name;?> is a sweet angel who loves to play with other cats. Except for the neighbours' cats, who he's ruthlessly mauled on several occasions. But don't let that put you off. He's really quite nice. Sometimes.</p>
            </div>
            <div class="profileSubhead"><p>Personality</p></div>
            <div class="profileInfo">
                <p>Playful: <?php echo $playful;?></p>
                <p>Angry: <?php echo $angry;?></p>
                <p>Somber: <?php echo $somber;?></p>
                <p>Independent: <?php echo $independent;?></p>
                <p>Cuddly: <?php echo $cuddly;?></p>
            </div>

            <div class="profileSubhead"><p>Likes</p></div>
            <div class="profileInfo">
                <p><?php echo $likes;?></p>
            </div>

            <div class="profileSubhead"><p>Dislikes</p></div>
            <div class="profileInfo">
                <p><?php echo $dislikes;?></p>
            </div>

            <div class="profileSubhead"><p>Location</p></div>
            <div class="profileInfo">
                <p><?php echo $location;?></p>
            </div>

            
                <input type="button" class="pillButton" value="Edit Profile" onclick="window.location.href = 'editprofile.php';">
            
        </div>



    </div>
    
</body>
</html>