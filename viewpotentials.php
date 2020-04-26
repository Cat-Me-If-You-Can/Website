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
    <link rel="stylesheet" href="static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find cats</title>
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
            <div class="profileTitle">Meet<br>Cats</div>
        
        <div class="profileDesc">
            <p>Find new cats to meet and play with. But remember, be friendly!</p>
            <p>Being catty is not a virtue.</p>
            <p>Not getting many playdates? <a class="keylink" href="profile.php">Try tuning your profile.</a></p>
        </div>
    </div>

        <div class="profileInfoBox">
            <div class="profileHeader">
                <div class="profileName"><?php echo $name2;?></div>
                
                    <?php if(matchExists($id,$id2) === TRUE || $id2 == NULL) { echo "No cats left for now. Try again later.";}
                    else { if($picture2 == true) { ?>
                        <div class="profilePic"><img src="static/images/<?php echo $picture2;?>" alt="profypic"></div>
                    <?php } else { ?>
                        <?php
                    }
                    }?>
                <div class="profilePic"><img src="static/images/cutecat1.jpg" alt="profypic"></div>
            
            
            </div>
            <div class="profileSubhead"><p>Personality</p></div>
            <div class="profileInfo">
                <p>Playful: <?php echo $playful2;?></p>
                <p>Angry: <?php echo $angry2;?></p>
                <p>Somber: <?php echo $somber2;?></p>
                <p>Independent: <?php echo $independent2;?></p>
                <p>Cuddly: <?php echo $cuddly2;?></p>
            </div>

            <div class="profileSubhead"><p>Likes</p></div>
            <div class="profileInfo">
                <p><?php echo $likes2;?></p>
            </div>

            <div class="profileSubhead"><p>Dislikes</p></div>
            <div class="profileInfo">
                <p><?php echo $dislikes2;?></p>
            </div>

            <div class="profileSubhead"><p>Location</p></div>
            <div class="profileInfo">
                <p><?php echo $location2;?></p>
            </div>

            <div class="likeOrDislikeButtons">
                <form action="match.php" method="post">
                    <input type="hidden" name="like" value="yes">
                    <input type = "hidden" name = "cat1" value = <?php echo $id;?> />
                    <input type = "hidden" name = "cat2" value = <?php echo $id2;?> />
                    <input type="submit" class="pillButton" value="Like">
                </form>

                <form action="match.php" method="post">
                    <input type="hidden" name="like" value="no">
                    <input type = "hidden" name = "cat1" value = <?php echo $id;?> />
                    <input type = "hidden" name = "cat2" value = <?php echo $id2;?> />
                    <input type="submit" class="pillButton" value="Next cat!">
                </form>
                
            </div>
        </div>
    </div>
    
</body>
</html>