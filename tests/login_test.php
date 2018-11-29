<?php
include "../src/login.php";
   
//$p2 = login("jsnake@scu.edu", "hunter2");
$p2 = login("pwahrens@gmail.com", "default");
    
if ($p2) {
    echo "Logged in!" . "<br>";
} else {
    echo "ERROR: Login failed" . "<br>";
}	
?>
