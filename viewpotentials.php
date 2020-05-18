/**
view potentials - shows the cats that you are able to match with. shows matchable cats according to your user specifications
Versions 1.4
@authors Jake Cleland, Jack Dowling, Patrick Jones
 */

<?php 
// this is the view potential matches page
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
 $bio=$row["bio"];
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
 $bio=null;
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
 $bio2=$row2["bio"];
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

	 if(isset ($row2["id"])) {
	 $id2=$row2["id"];
	 $picture2=$row2["picture"];
	 $name2=$row2["name"];
     $gender2=$row2["gender"];
     $bio2=$row2["bio"];
	 $playful2=$row2["playful"];
	 $angry2=$row2["angry"];
	 $somber2=$row2["somber"];
	 $independent2=$row2["independent"];
	 $cuddly2=$row2["cuddly"];
	 $likes2=$row2["likes"];
	 $dislikes2=$row2["dislikes"];
	 $location2=$row2["location"];
	 }else {
	 $name2=null;
	 $id2=null;
	 $location2=0;
	}
 } 
 echo $id;
 echo " ";
 echo $id2;
 
 
 
 function diffcalc($lat1, $lon1, $lat2, $lon2) {
	$thet = $lon1 - $lon2;
	$dist = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($thet)));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$kmperlat = 111.325;
	$dist = $dist * $kmperlat;
	return (round($dist));
} 
 
 function mysqli_result($res, $row, $field=0) {
	 $res->data_seek($row);
	 $datarow = $res->fetch_array();
	 return $datarow[$field];
 }
 
 function distcalc($loc1, $loc2) {
	global $link;
	$res1 = mysqli_query($link, "SELECT * FROM suburbs WHERE lat <> 0 and lon <> 0 and name = UPPER('".$loc1."')");
	$res2 = mysqli_query($link, "SELECT * FROM suburbs WHERE lat <> 0 and lon <> 0 and name = UPPER('".$loc2."')");
	
	if($res1 && $res2){
	$num1 = mysqli_num_rows($res1);
	$num2 = mysqli_num_rows($res2);
	
		if ($num1 != 0 && $num2 != 0){
			$lat1 = mysqli_result($res1,0,"lat");
			$lon1 = mysqli_result($res1,0,"lon");
			$lat2 = mysqli_result($res2,0,"lat");
			$lon2 = mysqli_result($res2,0,"lon");
			$dist = diffcalc($lat1, $lon1, $lat2, $lon2);
			echo $dist;
			return $dist;
		}
	}
 }
 if ((isset($row["location"])) && (isset($row2["location"]))){
 $distance = distcalc($row["location"],$row2["location"]);
 }
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
        <p id="cmiyc">Cat Me If You Can</p>
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
                    else { ?>
                    
                   
                      <?php
                    if($picture2 == true) { ?>
                        <div class="profilePic"><img src="static/images/<?php echo $picture2;?>" alt="profypic"></div>
                    <?php } 
                    else { ?>
                        <?php
                    }
                    ?>
            
            <div class="profileSubhead"><p>Bio</p></div>
            <div class="profileInfo">
                <p><?php echo $bio2;?></p>
            </div>            
            
            </div>
            <div class="profileSubhead"><p>Personality</p></div>
            <div class="profileInfo">
				<p class="personality">Playful: <?php echo getTraitLevel($playful2);?>&nbsp;</p><div class="barBack" style="display: inline-block; vertical-align: middle"><div class="barFront" style="width:<?php echo $playful2;?>%"></div></div>
                <p class="personality">Angry: <?php echo getTraitLevel($angry2);?>&nbsp;</p><div class="barBack" style="display: inline-block; vertical-align: middle"><div class="barFront" style="width:<?php echo $angry2;?>%"></div></div>
                <p class="personality">Somber: <?php echo getTraitLevel($somber2);?>&nbsp;</p><div class="barBack" style="display: inline-block; vertical-align: middle"><div class="barFront" style="width:<?php echo $somber2;?>%"></div></div>
                <p class="personality">Independent: <?php echo getTraitLevel($independent2);?>&nbsp;</p><div class="barBack" style="display: inline-block; vertical-align: middle"><div class="barFront" style="width:<?php echo $independent2;?>%"></div></div>
                <p class="personality">Cuddly: <?php echo getTraitLevel($cuddly2);?>&nbsp;</p><div class="barBack" style="display: inline-block; vertical-align: middle"><div class="barFront" style="width:<?php echo $cuddly2;?>%"></div></div>
            </div>

            <div class="profileSubhead"><p>Likes</p></div>
            <div class="profileInfo">
                <p><?php echo $likes2;?></p>
            </div>

            <div class="profileSubhead"><p>Dislikes</p></div>
            <div class="profileInfo">
                <p><?php echo $dislikes2;?></p>
            </div>
			<div class="profileSubhead"><p>Distance</p></div>
			<div class="profileInfo"><p>
			<?php echo $distance;?> Km's
			</p></div>

            <div class="profileSubhead"><p>Suburb</p></div>
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
    <?php }  ?>
</body>
</html>
