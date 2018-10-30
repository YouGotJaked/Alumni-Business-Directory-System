<?php
    include "../src/login.php";
    
    $user = new User();
    $json = '{
    "id":0,
    "first_name":"The",
    "last_name":"Thinker",
    "degree":"philosophy",
    "graduation_year":2077,
    "email":"hello@world.com",
    "hashed_password":"$2y$10$yijNQx65Am.35DNmWt2AJeiN/Hy6aeE38LFAkc/Sqkh/fl8AlWkhG",
    "role":"Owner",
    "business_id":0
    }';
    
    $add_resp = $user->add($json);
    
    if ($add_resp) {
        echo "User has been added" . "<br>";
    } else {
        echo "Failed to add user" . "<br>";
    }
    /*
    $p2 = login("hello@world.com", "hunter2");

    if ($p2) {
        echo "Match!\n";
    } else {
        echo "ERROR\n";
    }*/
?>
