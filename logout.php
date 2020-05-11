<?php
session_start();
//destorys session and logs user out
session_destroy();

header('location: index.html');
?>