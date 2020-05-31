<!-- /**
report - insert data into report table on the database
Versions 1.4
@authors Patrick Jones
 */ -->
 <?php

require_once 'init.php';

global $connect;

$reportingCatId = $_POST['reportingCatId'];
$reportedCatId = $_POST['reportedCatId'];
$reportDetails = $_POST['reportDetails'];
// files are report into the database
$sql = "INSERT INTO reports (reportingCatId, reportedCatId, reportDetails) VALUES ('$reportingCatId', '$reportedCatId', '$reportDetails')";
$query = $connect->query($sql);

header('location: matches.php');

$connect->close();

?>

