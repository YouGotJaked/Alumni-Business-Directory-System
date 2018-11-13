<?php
class Database {
    static $conn;

    public function connect() {
        // Connect to database if connection not yet established
        if (!isset($conn)) {
            $config = parse_ini_file("../local/config.ini");  // retrieve db credentials
            $this->conn = mysqli_connect($config["host"], $config["user"], $config["pass"], $config["name"]);
        }
        
        if ($this->conn->connect_error) {
            die();
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function close() {
        $this->conn->close();
        return !is_resource($this->conn);
    }
}
?>
