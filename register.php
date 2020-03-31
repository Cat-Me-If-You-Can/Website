<?php 
 
require_once 'init.php';
 
// form is submitted
if($_POST) {
 

    #not sure what our data will be, here are some place holders
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
 
    if($email == "") {
        echo " * Email is Required <br />";
    }
 
    if($password == "") {
        echo " * Password is Required <br />";
    }
 
    if($cpassword == "") {
        echo " * Conform Password is Required <br />";
    }
 
    if($email && $password && $cpassword) {
 
        if($password == $cpassword) {
            if(userExists($email) === TRUE) {
                echo $_POST['email'] . " already exists !!";
            } else {
                if(registerUser() === TRUE) {
                    echo "Successfully Registered, you can now login!<a href='login.html'>Login</a>";
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
 