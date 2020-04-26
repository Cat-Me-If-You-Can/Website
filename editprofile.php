<?php 
require_once 'init.php';
global $connect;
echo $_SESSION['id'];

 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();

 if(isset($row["name"])){
 $picture=$row["picture"];
 $bio=$row["bio"];
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
 $bio=null;
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
    <title>Edit profile</title>
</head>
<body>
<div class="header">
        <p><a href="profile.php">Your Cats</a></p>
        <p><a href="viewpotentials.php">Look for dates</a></p>
        <p>Cat Me If You Can</p>
        <p><a href="matches.php">Matches</a></p>
        <p><a href="logout.php">Sign out</a></p>
</div>

    <div class="container">
        <div class="profileHead">
            <img class="headerPic" src="static/images/cutecat1.jpg" alt="catpic">
            <div class="profileTitle">Edit<br>Profile</div>
        
        <div class="profileDesc">
            <p>This is where you put all the info about your cat.</p>
            <p>Done here? <a class="keylink" href="viewpotentials.php">Start meeting new cats!</a></p>
        </div>
    </div>

        <form action="createprofile.php" method="post" enctype="multipart/form-data" class="profileInfoBox">
            <div class="profileHeader">
                <div class="profileName"><input class="profileNameEntry" placeholder="Enter cat's name" type="text" name="name" value="<?php echo $name;?>"></div>
                <div class="profilePic">
                    <input type="button" value="Upload Profile Pic" onclick="document.getElementById('file').click();">
                    <input type="file" style="display:none;" id="file" name="uploadfile">
                </div>
            </div>
            <div class="profileSubhead"><p>Gender</p></div>
            <div class="profileInfo">
                <select name="gender" id=""  class="profileInfoEntry">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="profileSubhead"><p>Bio</p></div>
            <div class="profileInfo"><input class="profileInfoEntry" placeholder="Enter a small bio about your cat" type="text" value="<?php echo $bio;?>">
               <!-- <p><?php echo $name;?> is a sweet angel who loves to play with other cats. Except for the neighbours' cats, who he's ruthlessly mauled on several occasions. But don't let that put you off. He's really quite nice. Sometimes.</p> -->
            </div>
            <div class="profileSubhead"><p>Personality</p></div>
            <div class="profileInfo">
                <div class="sliders">
                <label for="playful">playful (between 0 and 100):</label>
                <input type="range" id="playful" name="playful" min="0" max="100" value="<?php echo $playful;?>">

                <label for="angry">angry (between 0 and 100):</label>
                <input type="range" id="angry" name="angry" min="0" max="100" value="<?php echo $angry;?>">

                <label for="somber">somber (between 0 and 100):</label>
                <input type="range" id="somber" name="somber" min="0" max="100" value="<?php echo $somber;?>">

                <label for="independent">independent (between 0 and 100):</label>
                <input type="range" id="independent" name="independent" min="0" max="100" value="<?php echo $independent;?>">

                <label for="cuddly">cuddly (between 0 and 100):</label>
                <input type="range" id="cuddly" name="cuddly" min="0" max="100" value="<?php echo $cuddly;?>">
                </div>
            </div>

            <div class="profileSubhead"><p>Likes</p></div>
            <div class="profileInfo">
            <input class="profileInfoEntry" type="text" name="likes" value="<?php echo $likes;?>">
            </div>

            <div class="profileSubhead"><p>Dislikes</p></div>
            <div class="profileInfo">
            <input class="profileInfoEntry" type="text" name="dislikes" value="<?php echo $dislikes;?>"> 
            </div>

            <div class="profileSubhead"><p>Suburb</p></div>
            <div class="profileInfo">
            <input class="profileInfoEntry" type="text" name="location" value="<?php echo $location;?>"> 
            </div>
			
            
            <input type="submit" name="upload" class="pillButton" value="Upload">
            
        </div>



    </div>
    
</body>
</html>