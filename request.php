<!-- /**
request - gets messages
Versions 1.4
@authors Jake Cleland, Jack Dowling
 */ -->

<?php

require_once 'init.php';
global $connect;

// Session variables might not be the most reliable way to do this but it's working for now
// If stuff acts weird, try posting this data to this file instead.
// ($id can remain a session ID 'cos it's what you're logged in as.)
$id = $_SESSION['catid'];
$id4 = $_SESSION['othercatid'];

// Get all the messages in the table related to your cat and the other cat
$sql = "select * from messages where (sendID='$id' AND receiveID='$id4') OR (receiveID='$id' AND sendID='$id4') ORDER by 1 ASC";
$query = $connect->query($sql);

// While there's messages
while ($row = $query->fetch_assoc()) {
    $msg_content = $row['content'];
    $receiveid = $row['receiveID'];
    $sendid = $row['sendID'];

    // If you sent the message, do pink box
    if ($id == $sendid) {
        echo "
        <li>
        <div class='right-chat'>
        <p>$msg_content</p>
        </div>
        </li>
        ";
    }
    // If you're receiving a message, do the grey box.
    else if ($id == $receiveid) {
        echo "<ul>";
        echo "
        <li>
        <div class='left-chat'>
        <p>$msg_content</p>
        </div>
        </li>
        ";
        echo "</ul>";
    }
}

?>