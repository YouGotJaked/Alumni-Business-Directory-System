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
