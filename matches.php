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
            <div class="match">
                <div class="profilePic matchPic">
                    <img src="static/images/cutecat1.jpg" alt="">
                </div>
                <div class="matchName">Bobby Lofts</div>
            </div>
            <div class="match">
                <div class="profilePic">
                    <img src="static/images/cutecat1.jpg" alt="">
                </div>
                <div class="matchName">Bobby Lofts</div>
            </div>
            <div class="match">
                <div class="profilePic">
                    <img src="static/images/cutecat1.jpg" alt="">
                </div>
                <div class="matchName">Bobby Lofts</div>
            </div>
            <div class="match">
                <div class="profilePic">
                    <img src="static/images/cutecat1.jpg" alt="">
                </div>
                <div class="matchName">Bobby Lofts</div>
            </div>
            <div class="match">
                <div class="profilePic">
                    <img  src="static/images/cutecat1.jpg" alt="">
                </div>
                <div class="matchName">Bobby Lofts</div>
            </div>
        </div>



    </div>
    
</body>
</html>