<?php
    include "entry.php";
    
    class Business extends Entry {
        public function add($json) {
            $database = new Database();
            $database->connect();
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
                      '$json_obj->id',
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
            $resp = $database->conn->query($query);
            $database->close();
            return $resp;
        }
        
        public function get($id) {
            $this->table = "businesses";
            return parent::get($id);
        }
        public function update($id, $key, $value) {
            $this->table = "businesses";
            return parent::update($id, $key, $value);
        }
        public function remove($id) {
            $this->table = "businesses";
            return parent::remove($id);
        }
    }
?>
