<?php 
require_once 'init.php';
 
        global $connect;
     
        $cat1 = $_POST['cat1']; //your cat
        $cat2 = $_POST['cat2']; //cat your chatting with
        $likes = $_POST['like'];
        //called when you like a chat
        $sql = "INSERT INTO likestable (cat1, cat2, likes) VALUES ('$cat1', '$cat2', '$likes')";
        $query = $connect->query($sql);
        
        //called if its a match
        //inserts the two cats into a row in the match table
        if(FullmatchExists($cat1,$cat2) === TRUE) {
            $matched = "yes";
            $sql = "INSERT INTO matchestable (likeID1, likeID2, matched) VALUES ('$cat1', '$cat2', '$matched')";
            $query = $connect->query($sql);
            echo "ITS A MATCH!";
            echo "<script>alert('ITS A MATCH!');</script>"; 
            header('location: viewpotentials.php');
            exit();
        } else {

        }        
            header('location: viewpotentials.php');
            exit();

?>

