<!-- /**
login - allows a user to login
Versions 1.4
@authors Patrick Jones, Jake Cleland
 */ -->

<?php
session_start();
require_once 'init.php';

// form submiited
if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "") {
        echo " * email Field is Required <br />";
    }

    if ($password == "") {
        echo " * Password Field is Required <br />";
    }
    //checks if enterd email and password exist as an admin in db, this will then take then to admin dashboard
    if ($email && $password) {
        if (userExists($email) == TRUE && $email === "admin") {
            $login = login($email, $password);
            if ($login) {
                $userdata = userdata($email);

                $_SESSION['id'] = $userdata['id'];

                header('location: admindashboard.php');
                exit();
            } else {
                echo "Incorrect email/password combination";
            }
            //checks if enterd email and password already exist in db, 
        } elseif (userExists($email) == TRUE && $email !== "admin") {
            $login = login($email, $password);
            if ($login) {
                $userdata = userdata($email);

                $_SESSION['id'] = $userdata['id'];

                header('location: profile.php');
                exit();
            } else {
                echo "Incorrect email/password combination";
            }
        } else {
            echo "email does not exists";
        }
    }
}
?>