<?php

/*
    DESCRIPTION: This module provides test cases for creating new users.
*/

include "../src/login.php";

create_user('Gary',
            'Snail',
            'Racing',
            1805,
            'gsnail@scu.edu',
            'hunter2',
            'Visitor',
            2);
    
create_user('Sponge',
            'Bob',
            'Slacking',
            1888,
            'sbob@scu.edu',
            'hunter2',
            'Visitor',
            3);
?>
