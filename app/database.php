<?php
	require_once('../public_html/resources/config.php');

	class Database { 
		public 	$conn;

		public function open() {
			global $config;
			$this->conn = new mysqli(
					$config['db']['host'],
					$config['db']['username'],
					$config['db']['password'],
					$config['db']['dbname']);

			if ($this->conn->connect_error) {
				die("Connection failed: " . $this->conn->connect_error);
			}
		}

		public function close() {
			return $this->conn->close();
		}

		public function query($sql) {
			return $this->conn->query($sql);
		}

		public function sanitize($unsafeStr) {
			return $this->conn->real_escape_string($unsafeStr);
		}

		public function error() {
			return $this->conn->error;
		}
	} 
?>
