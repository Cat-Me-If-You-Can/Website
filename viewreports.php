<?php

require_once 'init.php';
global $connect;

$sql = "select * from reports";
$query = $connect->query($sql);

// if(isset($row["reportingCatId"])) {
//     $reportingCatId = $row['reportingCatId'];
//     $reportedCatId = $row['reportedCatId'];
//     $reportDetails = $row['reportDetails'];
// }

// echo $reportingCatId;
// echo $reportedCatId;
// echo $reportDetails;

function getCatName($id) {
    global $connect;
    $sql = "select name from profile where id = '$id'";
    $query = $connect->query($sql);
    $row = $query->fetch_assoc();
    return $row['name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
</head>
<body>
<div class="header">
    <p><a href="profile.php">
        <!-- <img src="static/images/icons/cat.png" alt=""> -->
        <span>Your Cats</span>
    </a></p>
    <p><a href="viewpotentials.php">Look for dates</a></p>
    <p id="cmiyc">Cat Me If You Can</p>
    <p><a href="matches.php">Matches</a></p>
    <p><a href="logout.php">Sign out</a></p>
</div>

<div class="container">
    <div class="profileHead">
        <img class=headerPic src="static/images/cutecat1.jpg" alt="">
        <div class="profileTitle">User<br>Reports</div>
    </div>
    <div class="reportsContent">
        <?php 
            if($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    $reportingCatId = $row['reportingCatId'];
                    $reportedCatId = $row['reportedCatId'];
                    $reportDetails = $row['reportDetails'];
                    ?>
                    <div class="reportsItem">
                        <div class="reportedCatId">Offender: <?php echo getCatName($reportedCatId); ?></div>
                        <div class="reportingCatId">Reported by: <?php echo getCatName($reportingCatId); ?></div>
                        <div class="reportDetails">Details: <?php echo $reportDetails; ?></div>
                        <div class="reportsActions">
                            <div class="removeUser"><p>
                                Remove User
                            </p></div>
                            <div class="dismissReport"><p>
                                Dismiss Report
                            </p></div>
                        </div>
                    </div>
            <?php 
                }
            }
            ?>
        
    </div>
</div>
    
</body>
</html>