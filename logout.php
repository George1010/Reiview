<?php session_start()
?>
<?php
session_unset();

// destroy the session
session_destroy();

header("location:index.php");
?>