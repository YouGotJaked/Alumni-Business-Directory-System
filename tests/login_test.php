<?php
    $p1 = password_hash("hunter2", PASSWORD_DEFAULT);
    $p2 = password_verify("hunter2", $p1);
    echo "$p2\n";
?>
