<?php
include "../src/login.php";
echo "Form Submitted" . "<br>";
create_user($_POST["first"], $_POST["last"], $_POST["degree"], $_POST["year"], $_POST["email"], $_POST["password"], "Visitor", 0);
?>
