<?php

class DBHandler
{

	private $servername = "localhost";
	private $username = "root";
	private $password = "058418Ms";
	private $database = "phpblog";

	private $conn;
	private $pdoConn;

	public function connect()
	{
		$this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
		if ($this->conn) {
			//echo 'Connected successfully!';
		} else {
			die("Connection failed: " . mysqli_connect_error());
		}
	}

	public function connectPdo()
	{
		try {
			$servername = $this->servername;
			$database = $this->database;
			$this->pdoConn = new PDO("mysql:host=$servername;dbname=$database", $this->username, $this->password);
			$this->pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		}
	}

	public function createNewBlogPost($post)
	{

		$title = $post["title"];
		$body = $post["body"];
		$published = $post["published"] or false;
		$dateCreated = $post['dateCreated'];

		try {
			$sql = "INSERT INTO post (id, published, title, body, date_created, date_last_edit)
			VALUES (NULL, '$published', '$title', '$body', '$dateCreated', NULL)";
			$this->pdoConn->exec($sql);
		} catch (PDOException $e) {
			echo $sql . "<br>" . $e->getMessage();
		}
	}

	public function getBlogPosts()
	{
		$query = 'SELECT * FROM post WHERE published = TRUE ORDER BY date_created DESC';
		$queryResult = mysqli_query($this->conn, $query);
		$posts = [];
		while ($tableRow = mysqli_fetch_assoc($queryResult)) {
			array_push($posts, $tableRow);
		}
		return $posts;
	}

	public function showAllPosts()
	{
		$query = 'SELECT * FROM post ORDER BY date_created DESC';
		$queryResult = mysqli_query($this->conn, $query);
		$posts = [];
		while ($tableRow = mysqli_fetch_assoc($queryResult)) {
			array_push($posts, $tableRow);
		}
		return $posts;
	}

	public function deletePost($delete_id)
	{
		$query = "DELETE FROM post WHERE id = '$delete_id'";
		$queryResult = mysqli_query($this->conn, $query);
		if ($queryResult) {
			header('Location: index.php');
		} else {
			echo 'ERROR: ' . mysqli_error($this->conn);
		}
	}

	public function editPost($edit_id)
	{
		$query = "SELECT * FROM post WHERE id = '$edit_id'";
		$queryResult =  mysqli_query($this->conn, $query);
		return mysqli_fetch_assoc($queryResult);
	}

	public function closeConnection()
	{
		mysqli_close($this->conn);
		unset($this->conn);
		//echo ("[DB Handler] Closed a connection." . PHP_EOL);
	}

	public function closePdoConnection()
	{
		$this->pdoConn = null;
	}
}
