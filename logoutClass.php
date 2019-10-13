<?php
session_start();
session_unset(); 
session_destroy();
unset($_SESSION['key']);//deleting session
header("Location:index.php?er=Logged Out");
?>