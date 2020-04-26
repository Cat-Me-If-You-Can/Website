<?php 
require_once 'init.php';
global $connect;
echo $_SESSION['id'];

 $sql="select * from profile where userid='".$_SESSION['id']."'";
 $query = $connect->query($sql);
 $row = $query->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="static/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="header">
        <p></p>
        <p>Menu</p>
        <p>Cat Me If You Can</p>
        <p><a href="logout.php">Sign out</a></p>
    </div>
    <div class="container">
        <div class="adminContent">
            <input type="button" class="pillButton" value="View Reports">
            <input type="button" class="pillButton" value="User Activity">
            <input type="button" class="pillButton" value="Manage Accounts">
</div>
</div>
</body>
</html>