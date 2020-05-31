<!-- /**
dismiss - remove reports from database (from report)
Versions 1.4
@authors Patrick Jones
 */ -->
<?php 
//requre the init php which give us database information
require_once 'init.php';
 
        global $connect;
        //gets values via post
        $reportingCatId = $_POST['reportingCatId'];
        $reportedCatId = $_POST['reportedCatId'];
        $reportDetails = $_POST['reportDetails'];
        echo "$reportingCatId";
        echo "$reportedCatId";
        //deletes the report from the database
        $sql = "DELETE from reports WHERE reportingCatId = '".$reportingCatId."' AND reportedCatId = '".$reportedCatId."'";
        $query = $connect->query($sql);
        //takes us best to viewreports
        header('location: viewreports.php');
        exit();

?>