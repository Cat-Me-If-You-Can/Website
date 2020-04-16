<?php 
require_once 'init.php';
echo $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/style.css">
    <title>Settings</title>
</head>
<body>
    <div class="container">
        <div id="logo">
        <img src="static/images/logo.png" alt="">
        </div>
        
        <button onclick="window.location.href = 'viewpotentials.php';">View Potentials</button>\
        <button onclick="window.location.href = 'matches.php';">View Matches</button>

</body>
<?php include 'navbar.php';?>
</html>

