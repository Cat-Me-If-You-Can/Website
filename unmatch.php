<!-- /**
unmatch - unmatches you from a user
Versions 1.4
@authors Patrick Jones
 */ -->

<?php
require_once 'init.php';

global $connect;

$matchid = $_POST['matchid'];
$mycatid = $_POST['mycatid'];
$no = "no";
$yes = "yes";
//removes match from the database
$sql = "UPDATE matchestable SET matched = '$no' WHERE ((likeID1 = '" . $matchid . "' AND likeID2 = '" . $mycatid . "') OR (likeID1 = '" . $mycatid . "' AND likeID2 = '" . $matchid . "')) AND matched = '$yes'";
$query = $connect->query($sql);

header('location: matches.php');
exit();
?>