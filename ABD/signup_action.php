<?php
include "../src/login.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Form Submitted" . "<br>";
    create_user($_POST["first"], $_POST["last"], $_POST["degree"], $_POST["year"], $_POST["email"], $_POST["password"], "Visitor", 0);
}
?>
