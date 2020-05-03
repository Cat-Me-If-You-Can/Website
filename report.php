<?php

require_once 'init.php';

global $connect;

$reportingCatId = $_POST['reportingCatId'];
$reportedCatId = $_POST['reportedCatId'];
$reportDetails = $_POST['reportDetails'];

$sql = "INSERT INTO reports (reportingCatId, reportedCatId, reportDetails) VALUES ('$reportingCatId', '$reportedCatId', '$reportDetails')";
$query = $connect->query($sql);

header('location: matches.php');

$connect->close();

?>
