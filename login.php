<?php 
 

 
if(logged_in() === TRUE) {
    header('location: dashboard.php');
}
 
// form submiited
if($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    if($email == "") {
        echo " * email Field is Required <br />";
    }
 
    if($password == "") {
        echo " * Password Field is Required <br />";
    }
 
    if($email && $password) {
        if(userExists($email) == TRUE) {
            $login = login($email, $password);
            if($login) {
                $userdata = userdata($email);
 
                $_SESSION['id'] = $userdata['id'];
 
                header('location: dashboard.php');
                exit();
                     
            } else {
                echo "Incorrect email/password combination";
            }
        } else{
            echo "email does not exists";
        }
    }
 
} // /if
 
 
?>