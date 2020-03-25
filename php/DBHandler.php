<?php

class DBHandler {

    private $DB_HOST = 'localhost';
    private $DB_USER = 'root';
    private $DB_PASS = '';
    private $DB_NAME = 'phpblog';

	private $connection;

	public function connect() {

		$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (!$this->con) {
			echo "[DB Handler] Error: Unable to connect to MySQL." . PHP_EOL;
			echo "[DB Handler] Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "[DB Handler] Debugging error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
				
		echo ("[DB Handler] Connected to MySQL host " . mysqli_get_host_info($this->con) . PHP_EOL);
    }

    public function close_connection(){
        mysqli_close($this->con);
        unset($this->con);
        echo ("[DB Handler] Closed a connection." . PHP_EOL);
    }

	public function addTierSample($json) {

	}

}

?>