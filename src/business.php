<?php
include 'database.php';

class Business {

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
		)

		VALUES (
			$json_obj->id,
			$json_obj->name,
			$json_obj->status,
			$json_obj->description,
			$json_obj->category,
			$json_obj->street,
			$json_obj->city,
			$json_obj->state,
			$json_obj->zip,
			$json_obj->country,
			$json_obj->owner_id
		)";

		$result = $database->conn->query($query);

		echo $result;
    }
    
    public function get($id) {
		$database = new Database();

		$database->connect();

		$query = "SELECT * FROM businesses WHERE id={$id}";

		$result = $database->conn->query($query);

		echo $result;
    }

    public function update($id, $key, $value) {
		$database = new Database();

		$database->connect();

		$query = "UPDATE businesses SET {$key} = ${value} WHERE id={$id}";

		$result = $database->conn->query($query);

		echo $result;
    }

    public function remove($id) {
		$database = new Database();

		$database->connect();

		$query = "SELECT * FROM businesses WHERE id={$id}";

		$result = $database->conn->query($query);

		echo $result;
    }
}

?>