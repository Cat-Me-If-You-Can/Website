<!-- /**
useractivity - displays user activity
Versions 1.4
@authors Jake Cleland
 */ -->

<?php 

require_once 'init.php';
global $connect;

function getCount($table) {
    global $connect;
    $sql = "SELECT COUNT(*) FROM $table";
    $query = $connect->query($sql);
    $row = $query->fetch_assoc();
    return $row['COUNT(*)'];
}

function getGenderBalance() {
    global $connect;
    $sql = "SELECT gender FROM profile";
    $query = $connect->query($sql);
    $male = 0;
    $female = 0;
    while($row = $query->fetch_assoc()) {
        
        $gender[] = $row['gender'];
    }
    
    for($i = 0; $i < sizeof($gender); $i++) {
        if($gender[$i] == 'Male') {
            $male++;
        } else {
            $female++;
        }
    }

    $percentageMale = round($male / sizeof($gender) * 100, 2);
    $percentageFemale = round($female / sizeof($gender) * 100, 2);
    $genderBalance = array('male' => $percentageMale, 'female' => $percentageFemale);
    return $genderBalance;


}

$numberOfUsers = getCount('users');
$numberOfMatches = getCount('matchestable');
$numberOfLikes = getCount('likestable');
$numberOfMessages = getCount('messages');

$malePercentage = getGenderBalance()['male'];
$femalePercentage = getGenderBalance()['female'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | User Activity</title>
</head>
<body>
<div class="header">
    <p><a href="viewreports.php">
        <!-- <img src="static/images/icons/cat.png" alt=""> -->
        View Reports
    </a></p>
    <p><a href="useractivity.php">User Activity</a></p>
    <p id="cmiyc">Cat Me If You Can</p>
    <p><a href="../phpMyAdmin">Manage Accounts</a></p>
    <p><a href="logout.php">Sign out</a></p>
</div>

<div class="container">
    <div class="profileHead">
        <img src="static/images/cutecat1.jpg" alt="" class="headerPic">
        <div class="profileTitle">User Activity</div>
        <div class="profileDesc">View stats based on website usage and userbase.<br><br>Done here? Head back to <a class="keylink" href="admindashboard.php">the dashboard.</a></div>
    </div>

    <div class="activityContent">
        <div class="activityContentItem textBox">
            <p class="statHeader">Total Users</p>
            <p class="statNumber"><?php echo $numberOfUsers;?></p>
            <p class="statDesc">That's heaps</p>
        </div>

        <div class="activityContentItem textBox">
            <p class="statHeader">Gender Balance</p>
            <p class="statNumber"><?php echo $malePercentage."/".$femalePercentage; ?></p>
            <p class="statDesc">Male/Female</p>
        </div>

        <div class="activityContentItem textBox">
            <p class="statHeader">Messages Sent</p>
            <p class="statNumber"><?php echo $numberOfMessages; ?></p>
            <p class="statDesc">That's a lot of compliments.</p>
        </div>

        <div class="activityContentItem textBox">
            <p class="statHeader">Total Matches</p>
            <p class="statNumber"><?php echo $numberOfMatches; ?></p>
            <p class="statDesc">All thanks to your app.</p>
        </div>

    </div>


</div>
    
</body>
</html>