<?php 
require_once 'init.php';
 
// form submiited
if(isset($_POST['upload'])) {
 
        global $connect;
    
        // prepare and bind
    
        $filename = $_FILES['uploadfile']['name'];
        $filetmpname = $_FILES['uploadfile']['tmp_name'];
        //folder where images will be uploaded
        $folder = 'static/images/';
        //function for saving the uploaded images in a specific folder
        move_uploaded_file($filetmpname, $folder.$filename);
     
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $playful = $_POST['playful'];
        $angry = $_POST['angry'];
        $somber = $_POST['somber'];
        $independent = $_POST['independent'];
        $cuddly = $_POST['cuddly'];
        $likes = $_POST['likes'];
        $dislikes = $_POST['dislikes'];
        $location = $_POST['location'];
        $userid = $_SESSION["id"];


            if(profileExists($_SESSION["id"]) === TRUE) {
                $sql = "UPDATE profile SET picture='$filename', name='$name', gender='$gender', playful='$playful', angry='$angry', somber='$somber', independent='$independent', cuddly='$cuddly', likes='$likes', dislikes='$dislikes', location='$location', userid='$userid' WHERE userid='".$_SESSION['id']."'";
                $query = $connect->query($sql);
                header('location: profile.php');
            exit();
            } else {
                
            $sql = "INSERT INTO profile (picture, name, gender, playful, angry, somber, independent, cuddly, likes, dislikes, location, userid) VALUES ('$filename', '$name', '$gender', '$playful', '$angry', '$somber', '$independent', '$cuddly', '$likes', '$dislikes', '$location', '$userid')";
            $query = $connect->query($sql);

            $sql="select * from profile where userid='".$_SESSION['id']."'";
            $query = $connect->query($sql);
            $row = $query->fetch_assoc();
           
            $id=$row["id"];

            $sql = "INSERT INTO matches (catid) VALUES ('$id')";
            $query = $connect->query($sql);
            // $stmt = $connect->prepare("INSERT INTO users (email, password, salt) VALUES ('$email', '$newPassword', '$salt')");
            // $stmt->bind_param("sss", $email, $newPassword, $salt);
            //$query = $connect->query($stmt);
           
            header('location: profile.php');
            exit();
  
  
}
}
?>