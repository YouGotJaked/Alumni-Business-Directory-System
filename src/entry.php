<?php
require_once "database.php";

class Entry {
    public $table;
    public $database;
        
    public function __construct() {
        $this->database = new Database();
    }
        
    public function get_one($key, $value) {
        $this->database->connect();
        
        $query = "SELECT * FROM $this->table WHERE $key='$value' LIMIT 1";
        $resp = $this->database->conn->query($query);
        // Extraction method adapted from https://stackoverflow.com/questions/383631/json-encode-mysql-results
        $json_obj;
        $rows = [];

        while($new_row = mysqli_fetch_assoc($resp)) {
            $rows[] = $new_row;
        }

        $json_obj = json_encode($rows, JSON_NUMERIC_CHECK);

        $this->database->close();

        return $json_obj;
    }

    public function get_all($key, $value) {
        $this->database->connect();

        $query;

        if ($key == "" and $value == "") {
            $query = "SELECT * FROM $this->table";
        } else {
            $query = "SELECT * FROM $this->table WHERE $key='$value'";
        }
        
        $resp = $this->database->conn->query($query);
        // Extraction method adapted from https://stackoverflow.com/questions/383631/json-encode-mysql-results
        $json_obj;
        $rows = [];
        
        while($new_row = mysqli_fetch_assoc($resp)) {
            $rows[] = $new_row;
        }
        
        $json_obj = json_encode($rows, JSON_NUMERIC_CHECK);
        $this->database->close();
        
        return $json_obj;
    }

    public function update($id, $key, $value) {
        $this->database->connect();
        $query = "UPDATE $this->table SET $key='$value' WHERE id='$id'";
        $resp = $this->database->conn->query($query);
        $this->database->close();
        
        return $resp;
    }

    public function remove($id) {
        $this->database->connect();
        $query = "DELETE FROM $this->table WHERE id='$id'";
        $resp = $this->database->conn->query($query);
        $this->database->close();
        
        return $resp;
    }
}
?>
