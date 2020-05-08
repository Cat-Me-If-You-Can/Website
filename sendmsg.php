<?php

require_once 'init.php';
global $connect;

// AJAX sends the post request with the sendMessage form data so capture it here
$sendid = $_POST['mycatid'];
$receiveid = $_POST['othercatid'];
// $receiveid = getReceiveId($sendid);
$content = $_POST['msg_content'];

$sql = "insert into messages(sendid, receiveid,content) values('$sendid', '$receiveid', '$content')";
$query = $connect->query($sql);


?>