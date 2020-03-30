<?php 

function userExists($email) {
    // global keyword is used to access a global variable from within a function
    global $connect;
 
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = $connect->query($sql);
    if($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }
 
    $connect->close();
    // close the database connection
}
 
function registerUser() {
 
    global $connect;

    // prepare and bind
 
    $email = $_POST['email'];
    $password = $_POST['password'];
     
    $salt = salt(32);
    $newPassword = makePassword($password, $salt);
    if($newPassword) {
        $stmt = $conn->prepare("INSERT INTO users (email, password, salt) VALUES ('$email', '$newPassword', '$salt')";
        $stmt->bind_param("sss", $email, $newPassword, $salt);
        $query = $connect->query($stmt);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }
    } // /if
 
    $connect->close();
    // close the database connection
} // register user funtion
 
function salt($length) {
    return mcrypt_create_iv($length);
}
 
function makePassword($password, $salt) {
    return hash('sha256', $password.$salt);
}

?>
 