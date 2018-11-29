<?php

/* 
    DESCRIPTION: This class is used to interact with the business table located in the database
*/

require_once "entry.php";

class Business extends Entry {

    /* 
    NAME: add
    PARAMETERS: 
        $json (String): A string with the structure of JSON
    RETURNS: 
        True if the business was added, false if it was not added
    DESCRIPTION: 
        This function takes in a JSON input, parses it, and attempts to add the business data into the database
    */
    public function add($json) {
        $this->database->connect();
        $json_obj = json_decode($json);

        $json_obj->name = mysqli_real_escape_string($this->database->conn, $json_obj->name);
        $json_obj->description = mysqli_real_escape_string($this->database->conn, $json_obj->description);
        $json_obj->street = mysqli_real_escape_string($this->database->conn, $json_obj->street);
        $json_obj->city = mysqli_real_escape_string($this->database->conn, $json_obj->city);
        $json_obj->state = mysqli_real_escape_string($this->database->conn, $json_obj->state);
        $json_obj->country = mysqli_real_escape_string($this->database->conn, $json_obj->country);

        $query = "INSERT INTO businesses (
            id,
            name,
            status,
            description,
            category,
            street,
            city,
            state,
            zip,
            country,
            owner_id
        ) VALUES (
            DEFAULT,
            '$json_obj->name',
            '$json_obj->status',
            '$json_obj->description',
            '$json_obj->category',
            '$json_obj->street',
            '$json_obj->city',
            '$json_obj->state',
            '$json_obj->zip',
            '$json_obj->country',
            '$json_obj->owner_id'
        )";

        $resp = $this->database->conn->query($query);
        $this->database->close();

        return $resp;
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
        $this->table = "businesses";
        return parent::get_one($key, $value);
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
        $this->table = "businesses";
        return parent::get_all($key, $value);
    }

    /* 
    NAME: update
    PARAMETERS:
        $id (Int): The id of the database entry you wish to update
        $key (Int): The database column with which you are trying to update a value
        $value (Int): The new value with which to replace the old value in the key
    RETURNS: True if the business was updated, false if it was not updated 
    DESCRIPTION: 
        This function updates a single value for a single business in the database.
    */
    public function update($id, $key, $value) {
        $this->table = "businesses";
        return parent::update($id, $key, $value);
    }

    /* 
    NAME: update_all_values 
    PARAMETERS:
        $id (Int): The id of the database entry you wish to update
        $json (String): A string with the keys and values to update
    RETURNS: True if the business was updated, false if it was not updated 
    DESCRIPTION: 
        This function updates multiple values for a single business in the database.
    */
    public function update_all_values($id, $json) {
        $this->database->connect();
        $json_obj = json_decode($json);

        $json_obj->name = mysqli_real_escape_string($this->database->conn, $json_obj->name);
        $json_obj->description = mysqli_real_escape_string($this->database->conn, $json_obj->description);
        $json_obj->street = mysqli_real_escape_string($this->database->conn, $json_obj->street);
        $json_obj->city = mysqli_real_escape_string($this->database->conn, $json_obj->city);
        $json_obj->state = mysqli_real_escape_string($this->database->conn, $json_obj->state);
        $json_obj->country = mysqli_real_escape_string($this->database->conn, $json_obj->country);

        $query = "UPDATE businesses SET
            name = '$json_obj->name',
            status = '$json_obj->status',
            description = '$json_obj->description',
            category = '$json_obj->category',
            street = '$json_obj->street',
            city = '$json_obj->city',
            state = '$json_obj->state',
            zip = '$json_obj->zip',
            country = '$json_obj->country',
            owner_id = '$json_obj->owner_id'
            WHERE id='$id'";

        $resp = $this->database->conn->query($query);
        $this->database->close();

        return $resp;
    }

    /* 
    NAME: remove
    PARAMETERS:
        $id (Int): The id of the business you wish to remove
    RETURNS: True if the business was removed, false if it was not removed
    DESCRIPTION: 
        This function removes a single business from the database 
    */
    public function remove($id) {
        $this->table = "businesses";
        return parent::remove($id);
    }
}
?>
