<?php
    include "../src/login.php";
    
    create_account(0,
    "The",
    "Thinker",
    "philosophy",
    2077,
    "hello@world.com",
    "$2y$10$yijNQx65Am.35DNmWt2AJeiN/Hy6aeE38LFAkc/Sqkh/fl8AlWkhG",
    "Owner",
    0);
    
    
    $p2 = login("hello@world.com", "hunter2");

    if ($p2) {
        echo "Match!\n";
    } else {
        echo "ERROR\n";
    }

    $user->remove($json);
?>
