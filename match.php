<?php 
require_once 'init.php';
 
        global $connect;
     
        $catid = $_POST['catid'];
        $catmatch = $_POST['catmatch'];
        $matched = $_POST['match']; 
                
            $sql = "INSERT INTO matches (catid, catmatch, matched) VALUES ('$catid', '$catmatch', '$matched')";
            $query = $connect->query($sql);

           
            header('location: viewpotentials.php');
            exit();

?>