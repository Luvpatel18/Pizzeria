<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the sign-in page or homepage
header("Location: signin.php");
exit();
?>
