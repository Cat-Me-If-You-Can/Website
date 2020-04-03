<?php 
session_start();
require_once 'init.php';
echo $_SESSION['id']; 
 
// form submiited
if(isset($_POST['upload'])) {
 
        global $connect;
    
        // prepare and bind
    
        $filename = $_FILES['uploadfile']['name'];
        $filetmpname = $_FILES['uploadfile']['tmp_name'];
        //folder where images will be uploaded
        $folder = 'images/';
        //function for saving the uploaded images in a specific folder
        move_uploaded_file($filetmpname, $folder.$filename);
     
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $personality1 = $_POST['personality1'];
        $personality2 = $_POST['personality2'];
        $personality3 = $_POST['personality3'];
        $likes = $_POST['likes'];
        $dislikes = $_POST['dislikes'];
        $location = $_POST['location'];
        $userid = $_SESSION["id"];
         
            $sql = "INSERT INTO profile (picture, name, gender, personality1, personality2, personality3, likes, dislikes, location, userid) VALUES ('$filename', '$name', '$gender', '$personality1', '$personality2', '$personality3', '$likes', '$dislikes', '$location', '$userid')";
            $query = $connect->query($sql);
            // $stmt = $connect->prepare("INSERT INTO users (email, password, salt) VALUES ('$email', '$newPassword', '$salt')");
            // $stmt->bind_param("sss", $email, $newPassword, $salt);
            //$query = $connect->query($stmt);
           
        echo "Successfully uploaded, you can now login!<a href='login.html'>Login</a>";
  
  
}

?>