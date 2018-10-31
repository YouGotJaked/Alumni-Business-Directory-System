<?php
    include "../src/login.php";
   
    $p2 = login("jsnake@scu.edu", "hunter2");

    if ($p2) {
        echo "Logged in!" . "<br>";
    } else {
        echo "ERROR: Login failed" . "<br>";
    }
	
?>
