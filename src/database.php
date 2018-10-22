<?php
class Database {
    public $host = "dbserver.engr.scu.edu";
    public $user = "pahrens";
    public $pass = "alUmni!43255BuSine33*";
    public $name = "sdb_pahrens";
    public $conn;

    public function connect() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->name);
    }

    public function close() {
        $this->conn->close();
    }
}

?>