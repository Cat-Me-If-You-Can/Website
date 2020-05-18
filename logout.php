/**
logout - allows a user to logout
Versions 1.4
@authors Patrick Jones
 */

<?php
session_start();
//destorys session and logs user out
session_destroy();

header('location: index.html');
?>