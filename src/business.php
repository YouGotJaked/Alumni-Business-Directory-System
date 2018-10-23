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

		if ($resp === TRUE) {
			echo "Business has been added" . "<br>";
		} else {
			echo "Failed to add business with the following error: " . $database->conn->error . "<br>";
		}

		$database->close();
    }
    
    public function get($id) {
		$database = new Database();

		$database->connect();

		$query = "SELECT * FROM businesses WHERE id='$id'";

		$resp = $database->conn->query($query);

		if ($resp === TRUE) {
			//TODO return json object of the data: https://www.w3schools.com/php/php_mysql_select.asp
		} else {
			echo "Failed to get business with the following error: " . $database->conn->error . "<br>";
		}

		$database->close();
    }

    public function update($id, $key, $value) {
		$database = new Database();

		$database->connect();

		$query = "UPDATE businesses SET $key='$value' WHERE id='$id'";

		$resp = $database->conn->query($query);

		if ($resp === TRUE) {
			echo "Business has been updated: " . $id . "<br>";
			echo $key . " is now " . $value . "<br>";
		} else {
			echo "Failed to update business with the following error: " . $database->conn->error . "<br>";
		}

		$database->close();
    }

    public function remove($id) {
		$database = new Database();

		$database->connect();

		$query = "DELETE FROM businesses WHERE id='$id'";

		$resp = $database->conn->query($query);

		if ($resp === TRUE) {
			echo "Business has been removed: " . $id . "<br>";
		} else {
			echo "Failed to remove business with the following error: " . $database->conn->error . "<br>";
		}

		$database->close();
    }
}

?>
