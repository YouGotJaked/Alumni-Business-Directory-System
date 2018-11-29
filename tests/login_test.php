/*
 DESCRIPTION: This module provides a test case for the login() function.
 */

<?php
include "../src/login.php";
   
$p2 = login("troth@scu.edu", "hunter2");
    
if ($p2) {
    echo "Logged in!" . "<br>";
} else {
    echo "ERROR: Login failed" . "<br>";
}	
?>
