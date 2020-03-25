<?php

class DBHandler {

	private $server = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "phpblog";

	private $conn;

	public function connect() {
		$this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);
		if ($this->conn) {
			echo 'Connected successfully!';
		} else {
			die("Connection failed: " . mysqli_connect_error());
		}
    }

	public function getBlogPosts() {
		$query = 'SELECT * FROM posts ORDER BY created_at DESC';
		$queryResult = mysqli_query($this->conn, $query);
		$posts = [];
		while($tableRow = mysqli_fetch_assoc($queryResult)) {
			array_push($posts, $tableRow);
		}
		return $posts;
	}

	// private $con;

	// public function connect() {

	// 	$this->connection = mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASS, $this->DB_NAME);

	// 	if (!$this->con) {
	// 		echo "[DB Handler] Error: Unable to connect to MySQL." . PHP_EOL;
	// 		echo "[DB Handler] Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	// 		echo "[DB Handler] Debugging error: " . mysqli_connect_error() . PHP_EOL;
	// 		exit;
	// 	}
				
	// 	echo ("[DB Handler] Connected to MySQL host " . mysqli_get_host_info($this->con) . PHP_EOL);
    // }

    public function closeConnection(){
        mysqli_close($this->conn);
        unset($this->conn);
        echo ("[DB Handler] Closed a connection." . PHP_EOL);
    }


}

?>