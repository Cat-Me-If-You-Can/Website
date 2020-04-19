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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
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
                <img id="profilepic" src="static/images/<?php echo $picture;?>" alt="Profile Picture">
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
            <p>playful: <?php echo $playful;?></p>
            <p>angry: <?php echo $angry;?></p>
            <p>somber: <?php echo $somber;?></p>
            <p>independent: <?php echo $independent;?></p>
            <p>cuddly: <?php echo $cuddly;?></p>
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
            <button class="bottomButton" onclick="window.location.href = 'editprofile.php';">Edit Profile</button>
            
        </div>
    </div>

</body>
<?php include 'navbar.php';?>
</html>