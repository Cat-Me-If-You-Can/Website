<?php 
require_once 'init.php';
global $connect;

 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();

 $picture=$row["picture"];
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

            <!-- If no profile pic, load blank white circle -->
            <div id="uploadProfilePic"></div>
            <img src="images/<?php echo $picture;?>" alt="Profile Pic" width="100" height="100">
            <!-- If profile pic, load into src below -->
            <!-- <img id="profilePic" src="static/images/logo.png" alt=""> -->
            
            <p>Personality</p>
            <!-- if personalityTraits, GET personality traits, else <p>Add more personality traits for your cat!</p>-->
            <p><?php echo $personality1;?></p>
            <p><?php echo $personality2;?></p>
            <p><?php echo $personality3;?></p>
            <p>Likes</p>
            <p><?php echo $likes;?></p>
            <p>Dislikes</p>
            <p><?php echo $dislikes;?></p>
            <p>Location</p>
            <p><?php echo $location;?></p>
            <button onclick="window.location.href = 'createprofile.html';">edit profile</button>
        </div>
    </div>
    
</body>
</html>