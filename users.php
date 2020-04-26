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

function profileExists($userid) {
    // global keyword is used to access a global variable from within a function
    global $connect;
 
    $sql = "SELECT * FROM profile WHERE userid = '$userid'";
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
     
    
    $newPassword = makePassword($password);
    if($newPassword) {
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$newPassword')";
        $query = $connect->query($sql);
        // $stmt = $connect->prepare("INSERT INTO users (email, password, salt) VALUES ('$email', '$newPassword', '$salt')");
        // $stmt->bind_param("sss", $email, $newPassword, $salt);
        //$query = $connect->query($stmt);
        if($query === TRUE) {
            return true;
        } else {
            return false;
        }
    } // /if
 
    $connect->close();
    // close the database connection
} // register user funtion
 
function makePassword($password) {
    return hash('sha256', $password);
}

function login($email, $password) {
    global $connect;
    $userdata = userdata($email);
 
    if($userdata) {
        $makePassword = makePassword($password);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$makePassword'";
        $query = $connect->query($sql);
 
        if($query->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }
 
    $connect->close();
    // close the database connection
}

function userdata($email) {
    global $connect;
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();
    if($query->num_rows == 1) {
        return $result;
    } else {
        return false;
    }
     
    $connect->close();
 
    // close the database connection
}

function matchExists($id, $id2) {
    // global keyword is used to access a global variable from within a function
    global $connect;
    $sql = "SELECT * FROM likestable WHERE cat1 = '$id' AND cat2 = '$id2'";
    $query = $connect->query($sql);
    if($query->num_rows == 1) {
        return true;
    } else {
        return false;
    }
 
    $connect->close();
    // close the database connection
}


function FullmatchExists($cat1, $cat2) {
    // global keyword is used to access a global variable from within a function
    global $connect;
    $yes = "yes";
    $sql = "SELECT * FROM likestable WHERE cat1 = '$cat1' AND cat2 = '$cat2' OR cat1 = '$cat2' AND cat2 = '$cat1' AND likes = '$yes'";
    $query = $connect->query($sql);
    if($query->num_rows == 2) {
        return true;
    } else {
        return false;
    }
 
    $connect->close();
    // close the database connection
}

function ifLikeExist() {
    // global keyword is used to access a global variable from within a function
    global $connect;
    $sql = "SELECT * FROM likestable";
    $query = $connect->query($sql);
    if($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }
 
    $connect->close();
    // close the database connection
}

function matchcheck($id) {
    // global keyword is used to access a global variable from within a function
    global $connect;
    $sql = "SELECT * FROM matchestable WHERE likeID1 = '$id' or likeID2 = '$id'";
    $query = $connect->query($sql);
    if($query->num_rows >= 1) {
        return true;
    } else {
        return false;
    }
 
    $connect->close();
    // close the database connection
}


function getTraitLevel($trait){
    $hellno = "hell no";
    $notVery = "not very";
    $sortof = "sort of";
    $verymuch = "very much";
    $extreamly = "extreamly";

    switch ($trait) {
        
        case ($trait<=20 && $trait>0):
            return $hellno;
            break;
        case $trait<=40:
            return $notVery;
            break;
        case $trait<=60:
            return $sortof;
            break;
        case $trait<=80:
            return $verymuch;
            break;
        case $trait<=100:
            return $extreamly;
            break;
        default:
            echo "ERROR";
    }

    $error = "error";
    return $error;
}
?>
 