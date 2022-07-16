<?php
class Database{
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "web2014"; 

	private function initDatabase($db){
		try {
			//create table
			$db->query("CREATE TABLE IF NOT EXISTS `users` (
				`user_id` int not null AUTO_INCREMENT,
				`email` varchar(100) not null,
				`username` VARCHAR(100) not null,
				`password` VARCHAR(100) not null,
				`avatar_path` VARCHAR(9999),
				`isAdmin` int default 0,
				PRIMARY KEY (`user_id`),
				UNIQUE(username),
				unique(email)
			)");

			$db->query("create table if not exists `products` (
				`product_id` int not null AUTO_INCREMENT PRIMARY KEY,
				`name` varchar(999) not null,
				`genres` varchar(1000) not null,
				`is_free` int DEFAULT 1,
				`about_the_game` varchar(4000),
				`header_image` varchar(1000),
				`pc_requirements` varchar(1000),
				`developers` varchar(1000),
				`publishers` varchar(1000),
				`platforms` varchar(1000),
				`release_date` varchar(1000),
				`price` int,
				`discount_percent` int
			)");

			$db->query("create table if not exists `genres` (
				`genre_id` int not null AUTO_INCREMENT PRIMARY KEY,
				`description` varchar(100)
			)");

			$db->query("create table if not exists `screenshots` (
				`screenshots_id` INT not null AUTO_INCREMENT PRIMARY KEY,
				`product_id` int not null,
				`path_full` varchar(100)
			)");

			$db->query("create table if not exists `movies` (
				`movies_id` INT not null AUTO_INCREMENT PRIMARY KEY,s
				`product_id` int not null,
				`path_full` varchar(100)
			)");

			//create admin account
			$db->query("insert into users (username, email, password, avatar_path, isAdmin) VALUES ('admin', 'admin@welgames.com', 'YWRtaW4=', '/assets/avatars/avatar6.png', 1)");

			return true;
		} catch (\Throwable $th) {
			return false;
		}
	}
    
    public function getConnection(){		
		$connection = new mysqli($this->host, $this->user, $this->password, $this->database);
		if($connection->connect_error){
			die("Error failed to connect to MySQL: " . $connection->connect_error);
		} else {
			if($this->initDatabase($connection)){
				return $connection;
			}
		}
    }
}

$db = new Database();
$connection = $db->getConnection();
?>