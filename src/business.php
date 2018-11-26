<?php
require_once "entry.php";

class Business extends Entry {
    public function add($json) {
        $this->database->connect();
        $json_obj = json_decode($json);

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
    
    public function get_one($key, $value) {
        $this->table = "businesses";
        return parent::get_one($key, $value);
    }

    public function get_all($key, $value) {
        $this->table = "businesses";
        return parent::get_all($key, $value);
    }

    public function update($id, $key, $value) {
        $this->table = "businesses";
        return parent::update($id, $key, $value);
    }

    public function update_all_values($id, $json) {
        $this->database->connect();
        $json_obj = json_decode($json);

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

    public function remove($id) {
        $this->table = "businesses";
        return parent::remove($id);
    }
}
?>
