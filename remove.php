<?php 
require_once 'init.php';
 
        global $connect;
     
        $reportingCatId = $_POST['reportingCatId'];
        $reportedCatId = $_POST['reportedCatId'];
        $reportDetails = $_POST['reportDetails'];
        echo "$reportingCatId";
        echo "$reportedCatId";

        $sql = "DELETE from reports WHERE reportingCatId = '".$reportingCatId."' AND reportedCatId = '".$reportedCatId."'";
        $query = $connect->query($sql);

        $sql = "DELETE from profile WHERE id = '".$reportedCatId."'";
        $query = $connect->query($sql);

        $sql = "DELETE from matchestable WHERE likeID1 = '".$reportedCatId."' OR likeID2 = '".$reportedCatId."'";
        $query = $connect->query($sql);
            
        header('location: viewreports.php');
        exit();

?>