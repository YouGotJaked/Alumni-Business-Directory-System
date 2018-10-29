<?php
    include 'database.php';
    
    class Entry {
        public $table;
        
        public function get($id) {
            // should a new database be created every time?
            $database = new Database();
            $database->connect();
            $query = "SELECT * FROM $this->table WHERE id='$id'";
            $resp = $database->conn->query($query);
            // Extraction method adapted from https://stackoverflow.com/questions/383631/json-encode-mysql-results
            $json_obj;
            $rows = [];
            while ($new_row = mysqli_fetch_assoc($resp)) {
                $rows[] = $new_row;
            }
            $json_obj = json_encode($rows, JSON_NUMERIC_CHECK);
            $database->close();
            return $json_obj;
        }
        
        // TODO: abstract `get` function to allow for all entry parameters
        public function get_by_email($email) {
            $database = new Database();
            $database->connect();
            $query = "SELECT * FROM $this->table WHERE email='$email'";
            $resp = $database->conn->query($query);
            $json_obj;
            $rows = [];
            while ($new_row = mysqli_fetch_assoc($resp)) {
                $rows[] = $new_row;
            }
            $json_obj = json_encode($rows, JSON_NUMERIC_CHECK);
            $database->close();
            return $json_obj;
        }
        
        public function update($id, $key, $value) {
            $database = new Database();
            $database->connect();
            $query = "UPDATE $this->table SET $key='$value' WHERE id='$id'";
            $resp = $database->conn->query($query);
            $database->close();
            return $resp;
        }
        
        public function remove($id) {
            $database = new Database();
            $database->connect();
            $query = "DELETE FROM $this->table WHERE id='$id'";
            $resp = $database->conn->query($query);
            $database->close();
            return $resp;
        }
    }
?>
