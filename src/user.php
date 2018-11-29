<?php

/* 
    DESCRIPTION: This class is used to interact with the user table located in the database
*/

require_once "entry.php";

class User extends Entry {

    /* 
    NAME: add
    PARAMETERS: 
        $json (String): A string with the structure of JSON
    RETURNS: 
        True if the user was added, false if it was not added
    DESCRIPTION: 
        This function takes in a JSON input, parses it, and attempts to add the user data into the database
    */
    public function add($json) {
        $this->database->connect();
        $json_obj = json_decode($json);

        $json_obj->first_name = mysqli_real_escape_string($this->database->conn, $json_obj->first_name);
        $json_obj->last_name = mysqli_real_escape_string($this->database->conn, $json_obj->last_name);
        $json_obj->degree = mysqli_real_escape_string($this->database->conn, $json_obj->degree);
        $json_obj->email = mysqli_real_escape_string($this->database->conn, $json_obj->email);

        $query = "INSERT INTO users (
            id,
            first_name,
            last_name,
            degree,
            graduation_year,
            email,
            hashed_password,
            role,
            business_id
        ) VALUES (
            DEFAULT,
            '$json_obj->first_name',
            '$json_obj->last_name',
            '$json_obj->degree',
            '$json_obj->graduation_year',
            '$json_obj->email',
            '$json_obj->hashed_password',
            '$json_obj->role',
            '$json_obj->business_id'
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
        $this->table = "users";
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
        $this->table = "users";
        return parent::get_all($key, $value);
    }

    /* 
    NAME: update
    PARAMETERS:
        $id (Int): The id of the database entry you wish to update
        $key (Int): The database column with which you are trying to update a value
        $value (Int): The new value with which to replace the old value in the key
    RETURNS: True if the user was updated, false if it was not updated 
    DESCRIPTION: 
        This function updates a single value for a single user in the database.
    */
    public function update($id, $key, $value) {
        $this->table = "users";
        return parent::update($id, $key, $value);
    }

    /* 
    NAME: remove
    PARAMETERS:
        $id (Int): The id of the user you wish to remove
    RETURNS: True if the user was removed, false if it was not removed
    DESCRIPTION: 
        This function removes a single user from the database 
    */
    public function remove($id) {
        $this->table = "users";
        return parent::remove($id);
    }
}
?>
