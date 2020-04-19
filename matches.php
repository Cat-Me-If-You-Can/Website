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

 $sql = "SELECT * FROM matchestable where likeID1 = '".$id."' OR likeID2 = '".$id."' AND matched = '$yes'";
 $query2 = $connect->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <title>Find A Match</title>
</head>
<body>
    <div class="container">
        <div id="logo">
            <img src="static/images/logo.png" alt="">
            </div>
            <h1>Matches</h1>
        <div class="matches">
        
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
                ?><div id="ppcontainer">
                
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
                <input type="submit" name="register"value="Chat" class="bottomButton inputButton">
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
<?php include 'navbar.php';?>
</html>