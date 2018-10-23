<?php

include "database.php";

$database = new Database();

$database->connect();

$database->close();        
?>
