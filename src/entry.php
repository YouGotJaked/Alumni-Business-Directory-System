<?php

/* 
    DESCRIPTION: This class is used to interact with the business and user tables located in the database. 
        The Business and User classes extend this class.
*/

require_once "database.php";

class Entry {
    public $table;
    public $database;
        
    /* 
    NAME: __construct
    PARAMETERS: none
    RETURNS: none
    DESCRIPTION: 
        This function initializes the public database variable
    */
    public function __construct() {
        $this->database = new Database();
    }
        
    /* 
    NAME: get_one
    PARAMETERS:
        $key (String): The database column with which you are trying to match a value
        $value (String or Int): The value you are checking the key for
    RETURNS: The results of this query packaged into JSON
    DESCRIPTION: 
        This function does a key-value search in the database and returns a single result packaged as JSON
    */
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

    /* 
    NAME: get_all
    PARAMETERS:
        $key (String): The database column with which you are trying to match a value
        $value (String or Int): The value you are checking the key for
    RETURNS: The results of this query packaged into JSON
    DESCRIPTION: 
        This function does a key-value search in the database and returns one or many results packaged as JSON
    */
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

    /* 
    NAME: update
    PARAMETERS:
        $id (Int): The id of the database entry you wish to update
        $key (Int): The database column with which you are trying to update a value
        $value (Int): The new value with which to replace the old value in the key
    RETURNS: True if the entry was updated, false if it was not updated 
    DESCRIPTION: 
        This function updates a single value for a single entry in the database.
    */
    public function update($id, $key, $value) {
        $this->database->connect();
        $query = "UPDATE $this->table SET $key='$value' WHERE id='$id'";
        $resp = $this->database->conn->query($query);
        $this->database->close();
        
        return $resp;
    }

    /* 
    NAME: remove
    PARAMETERS:
        $id (Int): The id of the entry you wish to remove
    RETURNS: True if the entry was removed, false if it was not removed
    DESCRIPTION: 
        This function removes a single entry from the database 
    */
    public function remove($id) {
        $this->database->connect();
        $query = "DELETE FROM $this->table WHERE id='$id'";
        $resp = $this->database->conn->query($query);
        $this->database->close();
        
        return $resp;
    }
}
?>
