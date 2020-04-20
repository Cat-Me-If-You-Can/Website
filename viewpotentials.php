<?php 
// This will need to retrieve a profile of a potential match, not the user.

require_once 'init.php';
global $connect;

 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();
 
 // checks for cat linked to active user
 if(isset($row["name"])){
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
 
 $lowerbound = $playful - 40;
 $upperbound = $playful  + 40;

 $lowerbound2 = $angry - 40;
 $upperbound2 = $angry  + 40;

 $lowerbound3 = $somber - 40;
 $upperbound3 = $somber  + 40;

 $lowerbound4 = $independent - 40;
 $upperbound4 = $independent  + 40;

 $lowerbound5 = $cuddly - 40;
 $upperbound5 = $cuddly  + 40;
//check if likes table is empty and current user has a cat
if(ifLikeExist() === FALSE && isset($row["name"])) {
    echo "no likes in like table";
    echo "session id";
    echo $_SESSION['id'];
    echo " ";
$sql="select * from profile where playful BETWEEN '".$lowerbound."' AND '".$upperbound."' AND angry BETWEEN '".$lowerbound2."' AND '".$upperbound2."' AND somber BETWEEN '".$lowerbound3."' AND '".$upperbound3."' AND independent BETWEEN '".$lowerbound4."' AND '".$upperbound4."' AND cuddly BETWEEN '".$lowerbound5."' AND '".$upperbound5."' AND NOT userid='".$_SESSION['id']."'";
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
 //checks if a current user has a cat created
 if(isset($row["name"])){
	 $sql = "SELECT * from profile where playful BETWEEN '".$lowerbound."' AND '".$upperbound."' AND angry BETWEEN '".$lowerbound2."' AND '".$upperbound2."' AND somber BETWEEN '".$lowerbound3."' AND '".$upperbound3."' AND independent BETWEEN '".$lowerbound4."' AND '".$upperbound4."' AND cuddly BETWEEN '".$lowerbound5."' AND '".$upperbound5."' AND id NOT IN (SELECT cat2 FROM likestable where cat1 = '".$id."') AND NOT userid='".$_SESSION['id']."'"; 
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
 } else {
	 $id = null;
	 $id2 = null;
 }
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
        <div class="profileDetails" id="loginform">
            
        <?php


        if(matchExists($id,$id2) === TRUE || $id2 == NULL) {
    echo "SORRY NO MORE MATCHES :( CHANGE YOUR PROFILE SETTINGS TO INCREASE CHANCES OF FINDING LOVE";
} else { ?>

            <!-- If profile picture, load into src below -->
            <!-- If no profile picture, display white circle -->
            <?php
            if($picture2 == true){
                ?><div id="ppcontainer">
                <img id="profilepic" src="static/images/<?php echo $picture2;?>" alt="Profile Picture">
                </div> <?php
            } else {
                ?><div id="uploadProfilePic"></div><?php
            }
            ?>
            <div class="profileBox">		
            <div class="subheading">
            <p id="profileName">Name</p>
            </div>
            <p><?php echo $name2;?></p>
            </div>
            <div class="profileBox">
            <div class="subheading">
            <p id="subheadPersonality">Personality</p>
            </div>
            <div class="personalityTraits">
            <!-- if personalityTraits, GET personality traits, else <p>Add more personality traits for your cat!</p>-->
            <p>playful: <?php echo $playful2;?></p>
            <p>angry: <?php echo $angry2;?></p>
            <p>somber: <?php echo $somber2;?></p>
            <p>independent: <?php echo $independent2;?></p>
            <p>cuddly: <?php echo $cuddly2;?></p>
            </div>
        </div>
            <div class="profileBox">
            <div class="subheading">
            <p id="subheadLikes">Likes</p>
            </div>
            <p><?php echo $likes2;?></p>
            </div>
            <div class="profileBox">
            <div class="subheading">
            <p id="subheadDislikes">Dislikes</p>
            </div>
            <p><?php echo $dislikes2;?></p>
            </div>
            <div class="profileBox">
            <div class="subheading">
            <p id="subheadLocation">Location</p>
            </div>
            <p><?php echo $location2;?></p>
            </div>
            <br><br>

            <div class="wantToMatch">
                    <p>Match with <?php echo $name2; ?>?</p>
            </div>

        <div class="thumbsButtons">
        <form  action="match.php" method="post">
            <input type="hidden" id="like" name="like" value="yes">
            <input type = "hidden" name = "cat1" value = <?php echo $id;?> />
            <input type = "hidden" name = "cat2" value = <?php echo $id2;?> />
            <button class="thumbsup"><p>Like</p>
            <img src="static/images/likeup2.png" alt="">
            </button>
        </form>
        <form action="match.php" method="post">
        <input type="hidden" id="like" name="like" value="no">
            <input type = "hidden" name = "cat1" value = <?php echo $id;?> />
            <input type = "hidden" name = "cat2" value = <?php echo $id2;?> />
            
            <button class="thumbsdown"><img src="static/images/dislikedown.png" alt="">
                <p>Next</p>
            </button>
            </form>

            </div>

            
            
     
            <p style="margin-bottom:100px"></p>   
        </div>
    </div>
    <!-- <div class="likeDislike">
        <div class="likeButton"><img src="static/images/like1.png" alt=""></div>
        <div class="dislikeButton"><img src="static/images/dislike1.png" alt=""></div>
    </div> -->
    <?php } ?>
 <script>
     like = (e) => {
        e.value = "yes";
        document.getElementById("like").value = "yes";
        alert(document.getElementById("like").value);

     }
     dislike = (e) => {
         e.value = "no"
     }
 </script>
</body>
<?php include 'navbar.php';?>
</html>