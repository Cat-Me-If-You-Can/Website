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

 $lowerbound = $playful - 99;
 $upperbound = $playful  + 99;

//check if likes table is empty 
if(ifLikeExist() === FALSE) {
    echo "no likes in like table";
    echo "session id";
    echo $_SESSION['id'];
    echo " ";
$sql="select * from profile where playful BETWEEN '".$lowerbound."' AND '".$upperbound."' AND NOT userid='".$_SESSION['id']."'";
$query2 = $connect->query($sql);
$row2 = $query2->fetch_assoc();

$id2=$row2["id"];
$picture2=$row2["picture"];
 $name2=$row2["name"];
 $gender2=$row2["gender"];
 $playful2=$row2["playful"];
 $angry2=$row2["angry"];
 $somber2=$row2["somber"];
 $independent2=$row2["independent"];
 $cuddly2=$row2["cuddly"];
 $likes2=$row2["likes"];
 $dislikes2=$row2["dislikes"];
 $location2=$row2["location"];

 echo $id;
 echo " ";
 echo $id2;
} else {

// if not then Select UserID from profile where userID NOT IN (Select cat2 from likes where cat1 == logged in user)



//  $sql = "SELECT profile.id, profile.userid, profile.name, profile.gender, profile.playful, profile.angry, profile.somber, profile.independent, profile.cuddly, profile.likes, profile.dislikes, profile.location, likestable.id, likestable.cat1, likestable.cat2, likestable.like, profile.picture
//  FROM profile
//  INNER JOIN likestable ON profile.id=likestable.cat1";
//  $query2 = $connect->query($sql);
//  $row2 = $query2->fetch_assoc();
 
// select from profile user id not in cat no

//  $sql = "SELECT profile.id, profile.userid, profile.name, profile.gender, profile.playful, profile.angry, profile.somber, profile.independent, profile.cuddly, profile.likes, profile.dislikes, profile.location, matches.catid, matches.catmatch, matches.matched, matches.wantstom, profile.picture
//  FROM profile
//  INNER JOIN matches ON profile.id=matches.catid WHERE matched='' AND NOT catid='$id' AND NOT wantstom='$id'";
//  $query2 = $connect->query($sql);
//  $row2 = $query2->fetch_assoc();
 
 # WHERE playful BETWEEN '".$lowerbound."' AND '".$upperbound."' AND NOT userid='".$_SESSION['id']."'
 
 #$sql="select * from profile where playful BETWEEN '".$lowerbound."' AND '".$upperbound."' AND NOT userid='".$_SESSION['id']."'";
 #$query2 = $connect->query($sql);
 #$row2 = $query2->fetch_assoc();
 
 $sql = "SELECT * from profile where id NOT IN (SELECT cat2 FROM likestable where cat1 = '".$id."')"; 
 $query2 = $connect->query($sql);
 $row2 = $query2->fetch_assoc();

 $id2=$row2["id"];
 $picture2=$row2["picture"];
 $name2=$row2["name"];
 $gender2=$row2["gender"];
 $playful2=$row2["playful"];
 $angry2=$row2["angry"];
 $somber2=$row2["somber"];
 $independent2=$row2["independent"];
 $cuddly2=$row2["cuddly"];
 $likes2=$row2["likes"];
 $dislikes2=$row2["dislikes"];
 $location2=$row2["location"];

 echo $id;
 echo " ";
 echo $id2;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <title>Find A Match</title>
</head>
<body>
    <div class="container">
        <div id="logo">
            <img src="static/images/logo.png" alt="">
            </div>
        <div class="profileDetails">
            
        <?php
        if(matchExists($id,$id2) === TRUE) {
    echo "SORRY NO MORE MATCHES :( CHANGE YOUR PROFILE SETTINGS TO INCREASE CHANCES OF FINDING LOVE";
} else { ?>

            <!-- If profile picture, load into src below -->
            <!-- If no profile picture, display white circle -->
            <?php
            if($picture2 == true){
                ?><div id="ppcontainer">
                <img id="profilepic" src="images/<?php echo $picture2;?>" alt="Profile Picture">
                </div> <?php
            } else {
                ?><div id="uploadProfilePic"></div><?php
            }
            ?>		
            <div class="subheading">
            <p>Name</p>
            </div>
            <p><?php echo $name2;?></p>
            <div class="subheading">
            <p>Personality</p>
            </div>
            <!-- if personalityTraits, GET personality traits, else <p>Add more personality traits for your cat!</p>-->
            <p>playful: <?php echo $playful2;?></p>
            <p>angry: <?php echo $angry2;?></p>
            <p>somber: <?php echo $somber2;?></p>
            <p>independent: <?php echo $independent2;?></p>
            <p>cuddly: <?php echo $cuddly2;?></p>
            <div class="subheading">
            <p>Likes</p>
            </div>
            <p><?php echo $likes2;?></p>
            <div class="subheading">
            <p>Dislikes</p>
            </div>
            <p><?php echo $dislikes2;?></p>
            <div class="subheading">
            <p>Location</p>
            </div>
            <p><?php echo $location2;?></p>
            <br><br>
            <form action="match.php" method="post">
            <div class="subheading"><p>Did you want to match with <?php echo $name2;?></p></div>
                <select name="like" id="genderSelection">
                <option value="yes">Yes</option>
                <option value="no">No</option>
                <input type = "hidden" name = "cat1" value = <?php echo $id;?> />
                <input type = "hidden" name = "cat2" value = <?php echo $id2;?> />
                <input type="submit" name="Submit" class="bottomButton inputButton" />
                </select>
            </form>
            <p style="margin-bottom:300px"></p>   
        </div>
    </div>
    <div class="likeDislike">
        <div class="likeButton"><img src="static/images/like1.png" alt=""></div>
        <div class="dislikeButton"><img src="static/images/dislike1.png" alt=""></div>
    </div>
    <?php } ?>
    <?php include 'navbar.php';?>
</body>
</html>