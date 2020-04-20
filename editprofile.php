<?php 
require_once 'init.php';
global $connect;

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
<!-- Work Sans -->
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
<!-- Rubik -->
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">
<!-- Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
<!-- Nunito -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&display=swap" rel="stylesheet">


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="static/style.css">
</head>
<body>
    <div class="container">
        <div id="logo">
            <img src="static/images/logo.png" alt="">
            </div>
            <h1>Create Profile</h1>
        
        <!-- If no profile pic, load this HTML: -->
        <!-- Adapted from https://stackoverflow.com/posts/36248168/revisions -->
       
        <!-- If profile pic, load this: -->
        <!-- On page load, PHP needs to do a GET to retrieve user's profile pic, store in a variable, and then the variable goes in the src below -->
        <!-- <img id="profilePic" src="" alt=""> -->

        <form action="createprofile.php" method="post" enctype="multipart/form-data">
            <div class="profilePic">
                <input type="button" id="uploadProfilePic" value="Upload Profile Pic" onclick="document.getElementById('file').click();">
                <input type="file" style="display:none;" id="file" name="uploadfile">
                <!-- <input type="file" name="uploadfile" /> -->
                </div>
        <div class="subheading">
        <p>Your Cat's Name</p>
        </div>
        <input type="text" name="name" value="<?php echo $name;?>">
        <div class="subheading"><p>Gender</p></div>
        
        <select name="gender" id="genderSelection">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        <div class="subheading"><p>Personality</p></div>

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
   
        <div class="subheading"><p>Likes</p></div>
        <input type="text" name="likes" value="<?php echo $likes;?>">
        <div class="subheading"><p>Dislikes</p></div>
        <input type="text" name="dislikes" value="<?php echo $dislikes;?>"> 
        <div class="subheading"><p>Location</p></div>
        <input type="text" name="location" value="<?php echo $location;?>"> 
        <input type="submit" name="upload" value="Upload" class="bottomButton inputButton" />
    </form>
</div>

</body>
<?php include 'navbar.php';?>
</html>