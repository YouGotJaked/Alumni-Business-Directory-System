<?php

/*
    DESCRIPTION: This module provides a test case for the login() function.
*/

include "../src/login.php";
   
$p2 = login("pwahrens@gmail.com", "default");
    
if ($p2) {
    echo "Logged in!" . "<br>";
} else {
    echo "ERROR: Login failed" . "<br>";
}	
?>
