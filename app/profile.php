<?php
	require_once('database.php');

	/**
	+------------+-------------+------+-----+---------+----------------+
	| Field      | Type        | Null | Key | Default | Extra          |
	+------------+-------------+------+-----+---------+----------------+
	| profile_id | int(11)     | NO   | PRI | NULL    | auto_increment |
	| username   | varchar(64) | NO   |     | NULL    |                |
	| password   | varchar(32) | NO   |     | NULL    |                |
	+------------+-------------+------+-----+---------+----------------+
	*/

	class Profile {
		private $_username;
		private $_password;
		private $_id;
		private $_queryData;

		function __construct($queryResult) {
			$this->_queryData = $queryResult->fetch_assoc();
			$this->_username = $this->_queryData['username'];
			$this->_password = $this->_queryData['password'];
			$this->_id = $this->_queryData['profile_id'];
		}
		
		public function username() {
			return $this->_username;
		}

		public function password() {
			return $this->_password;
		}

		public function id() {
			return $this->_id;
		}

		public function isCorrectPassword($password) {
			return md5($password) == $this->_password;
		}

		public function queryData() {
			return $this->_queryData;
		}
	};

	class ProfileManager {
		private $db;

		function __construct() {
			$this->db = new Database();
			$this->db->open();
		}

		function __destruct() {
			$this->db->close();
		}

		function hashPassword($password) {
			return md5($password);
		}

		function insertNew($username, $password) {
			$sql = "INSERT INTO Profile (username, password)
				VALUES ("
				. "'" . $this->db->sanitize($username) . "', "
				. "'" . $this->hashPassword($password) . "'"
				. ")";

			return $this->db->query($sql);
		}

		function queryByUsername($username) {
			$sql = "SELECT * FROM Profile where username="
				. "'" . $this->db->sanitize($username) . "';";
			return $this->db->query($sql);
		}
		
		function error() {
			return $this->db->error();
		}
	}
?>
