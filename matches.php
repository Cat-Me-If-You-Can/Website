<?php 
// This will need to retrieve a profile of a potential match, not the user.

require_once 'init.php';
global $connect;

 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();

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
	$id = null;
 }
 
 
 $yes = "yes";

 $sql = "SELECT * FROM matchestable where ((likeID1 = '".$id."') OR (likeID2 = '".$id."')) AND matched = '$yes'";
 $query2 = $connect->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matches</title>
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
            <div class="profileTitle">Your<br>Matches</div>
        
        <div class="profileDesc">
            <p>Here you can see everyone that matched with your cat.</p>
            <p>Have you found your purr-fect match? </p>
        </div>
        </div>

        <div class="matchContainer">
            <?php 
        if ($query2->num_rows > 0) {
    // output data of each row
    while($row2 = $query2->fetch_assoc()) {
        ?>
        <div class="match">
                <?php
                
                 $likeID1=$row2["likeID1"];
                 $likeID2=$row2["likeID2"];

                 if($likeID1 == $id)
                 {
                    $matchid = $likeID2;
                 }
                 else {
                    $matchid = $likeID1;
                }       
                    $sql4="select * from profile where id='".$matchid."'";
                    $query = $connect->query($sql4);
                    $row4 = $query->fetch_assoc();

                     $id4=$row4["id"];
                     $picture4=$row4["picture"];
                     $name4=$row4["name"];
                     $gender4=$row4["gender"];
                     $playful4=$row4["playful"];
                     $angry4=$row4["angry"];
                     $somber4=$row4["somber"];
                     $independent4=$row4["independent"];
                     $cuddly4=$row4["cuddly"];
                     $likes4=$row4["likes"];
                     $dislikes4=$row4["dislikes"];
                     $location4=$row4["location"];
            
                ?>
                <!-- Match's profile pic -->
                <?php
                if($picture4 == true){
                ?><div class="profilePic matchPic">
                
                <img id="profilepic" src="static/images/<?php echo $picture4;?>" alt="Profile Picture">
                
                </div>
                <?php
                } else 
                {
                
                echo '<img src="static/images/logo.png" alt="">';
                }
                ?>
                <p class="matchName"><?php echo "Name: " . $name4;?></p>
                <div class="form">
                <form action="chat.php" method="post">
                <input type = "hidden" name = "matchid" value = <?php echo $matchid;?> />
                <input type = "hidden" name = "mycatid" value = <?php echo $id;?> />
                <input type="submit" name="register"value="Chat" class="pillButton">
                </div>
                </form>
                </a>
                <!-- Match's name -->
            </div>
            <?php
    }
        }
    
         else {
        echo "0 results";
        }
        ?>
        </div>
        </div>
    </div>
</body>
</html>