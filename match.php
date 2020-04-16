<?php 
require_once 'init.php';
 
        global $connect;
     
        $catid = $_POST['catid'];
        $catmatch = $_POST['catmatch'];
        $matched = $_POST['match']; 
                
            $sql = "INSERT INTO matches (catid, catmatch, matched, wantstom) VALUES ('$catid', '$catmatch', '$matched', '')";
            $query = $connect->query($sql);

            $sql = "INSERT INTO matches (catid, catmatch, matched, wantstom) VALUES ('$catmatch', '', '', '$catid')";
            $query = $connect->query($sql);

            $sql = "DELETE FROM matches WHERE catid='".$_POST['catmatch']."' AND catmatch='' AND wantstom=''";
            $query = $connect->query($sql);



            // $sql = "UPDATE matches SET catid='$catid', catmatch='$catmatch', matched='$matched' WHERE catid='".$_POST['catid']."'";
            // $query = $connect->query($sql);

            // $sql = "UPDATE matches SET wantstom='$catid' WHERE catid='$catmatch'";
            // $query = $connect->query($sql);
            header('location: viewpotentials.php');
            exit();

?>

