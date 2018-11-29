/*
 DESCRIPTION: This module provides test cases for the Database class. It ensures the connect and disconnect functionalities work as intended.
 */

<?php
include "../src/database.php";
    
$database = new Database();
$connected = $database->connect();
    
if ($connected) {
    echo "Connection successful" . "<br>";
} else {
    echo "Connection failed: " . $database->conn->connect_error;
}
    
$closed = $database->close();
    
if ($closed) {
    echo "Connection closed" . "<br>";
} else {
    echo "Connection failed to close" . "<br>";
}
?>
