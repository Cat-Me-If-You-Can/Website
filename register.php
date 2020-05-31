<!-- /**
register php - sends register data to database 
Versions 1.4
@authors Patrick Jones, Jake Cleland
 */ -->

<?php 

require_once 'init.php';
 
// form is submitted
if($_POST) {
 

    //register varibles
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    //makes sure we have required info
    if($email == "") {
        echo " * Email is Required <br />";
    }
 
    if($password == "") {
        echo " * Password is Required <br />";
    }
 
    if($cpassword == "") {
        echo " * Conform Password is Required <br />";
    }
    //checks if varibles already exist in database    
    if($email && $password && $cpassword) {
 
        if($password == $cpassword) {
            if(userExists($email) === TRUE) {
                echo $_POST['email'] . " already exists !!";
            } else {
                if(registerUser() === TRUE) {
                    header('location: login.html');
                exit();
                } else {
                    echo "Error";
                }
            }
        } else {
            echo " * Password does not match with Conform Password <br />";
        }
    }
 
}
 
?>
 