<?php 
require_once 'init.php';
 
        global $connect;
     
        $cat1 = $_POST['cat1'];
        $cat2 = $_POST['cat2'];
        $likes = $_POST['like'];

        $sql = "INSERT INTO likestable (cat1, cat2, likes) VALUES ('$cat1', '$cat2', '$likes')";
        $query = $connect->query($sql);

        if(FullmatchExists($cat1,$cat2) === TRUE) {
            $matched = "yes";
            $sql = "INSERT INTO matchestable (likeID1, likeID2, matched) VALUES ('$cat1', '$cat2', '$matched')";
            $query = $connect->query($sql);
            echo "ITS A MATCH!";
            sleep(3);
            header('location: viewpotentials.php');
            exit();
        } else {

        }

        // $sql = "INSERT INTO matchtable (cat1, cat2, cat1m, cat2m) VALUES ('$catid', '$catmatch', '$matched', '')";
        // $query = $connect->query($sql);

        // $sql = "INSERT INTO matches (catid, catmatch, matched, wantstom) VALUES ('$catmatch', '', '', '$catid')";
        // $query = $connect->query($sql);

        // $sql = "DELETE FROM matches WHERE catid='".$_POST['catmatch']."' AND catmatch='' AND wantstom=''";
        // $query = $connect->query($sql);



            // $sql = "INSERT INTO matches (catid, catmatch, matched, wantstom) VALUES ('$catid', '$catmatch', '$matched', '')";
            // $query = $connect->query($sql);

            // $sql = "INSERT INTO matches (catid, catmatch, matched, wantstom) VALUES ('$catmatch', '', '', '$catid')";
            // $query = $connect->query($sql);

            // $sql = "DELETE FROM matches WHERE catid='".$_POST['catmatch']."' AND catmatch='' AND wantstom=''";
            // $query = $connect->query($sql);



            // $sql = "UPDATE matches SET catid='$catid', catmatch='$catmatch', matched='$matched' WHERE catid='".$_POST['catid']."'";
            // $query = $connect->query($sql);

            // $sql = "UPDATE matches SET wantstom='$catid' WHERE catid='$catmatch'";
            // $query = $connect->query($sql);
            
            header('location: viewpotentials.php');
            exit();

?>

