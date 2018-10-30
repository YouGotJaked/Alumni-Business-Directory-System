<?php

include 'entry.php';

class User extends Entry {

    public function add($json) {
		$this->database->connect();

		$json_obj = json_decode($json);

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
            '$json_obj->id',
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
    
    public function get_one($key, $value) {
		$this->table = "users";

		return parent::get_one($key, $value);
    }

    public function update($id, $key, $value) {
		$this->table = "users";

		return parent::update($id, $key, $value);
    }

    public function remove($id) {
		$this->table = "users";

		return parent::remove($id);
    }
}
?>
