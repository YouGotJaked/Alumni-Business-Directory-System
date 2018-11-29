/*
 DESCRIPTION: This module defines the Database class. The class provides functionality for connection and disconnecting to the MySQL database.
 */

<?php
class Database {
    public $conn;

    /*
     NAME: connect
     PARAMETERS: none
     RETURNS: (Boolean) True if connected to database succesfully, otherwise False
     DESCRIPTION: Initiates connection to MySQL database.
     NOTES: Database credentials are stored in a local .ini file with the following format:
        [database]
        host = "hostname"
        user = "username"
        pass = "password"
        name = "database name"
     */
    public function connect() {
        // Connect to database if connection not yet established
        if (!isset($conn)) {
            $config = parse_ini_file("../local/config.ini");  // retrieve credentials
            $this->conn = mysqli_connect($config["host"], $config["user"], $config["pass"], $config["name"]);
        }
        
        if ($this->conn->connect_error) {
            die();
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*
     NAME: close
     PARAMETERS: none
     RETURNS: (Boolean) True if connection is closed, otherwise False
     DESCRIPTION: Closes a previously opened database connection
     NOTES: is_resource($var) checks if $var is a resource (i.e. holding a reference to an external source).
     */
    public function close() {
        $this->conn->close();
        return !is_resource($this->conn);
    }
}
?>
