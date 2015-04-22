<?php
	require_once('database.php');

	/**
		+-------------+---------------------------------------------+------+-----+---------+----------------+
		| Field       | Type                                        | Null | Key | Default | Extra          |
		+-------------+---------------------------------------------+------+-----+---------+----------------+
		| issue_id    | int(11)                                     | NO   | PRI | NULL    | auto_increment |
		| image_path  | varchar(128)                                | NO   |     | NULL    |                |
		| tag         | enum('open','closed','rejected','accepted') | NO   |     | NULL    |                |
		| author      | varchar(64)                                 | NO   |     | NULL    |                |
		| description | varchar(1024)                               | NO   |     | NULL    |                |
		+-------------+---------------------------------------------+------+-----+---------+----------------+
	*/

	class Issue {
		private $_imagePath;
		private $_tag;
		private $_author;
		private $_description;
		private $_id;
		private $_queryData;

		function __construct($queryData) {
			$this->_queryData = $queryData->fetch_assoc();
			$this->_imagePath = $this->_queryData['image_path'];
			$this->_tag = $this->_queryData['tag'];
			$this->_author = $this->_queryData['author'];
			$this->_description = $this->_queryData['description'];
			$this->_id = $this->_queryData['issue_id'];
		}
		
		public function imagePath() {
			return htmlentities($this->_imagePath);
		}

		public function tag() {
			return htmlentities($this->_tag);
		}

		public function author() {
			return htmlentities($this->_author);
		}

		public function description() {
			return htmlentities($this->_description);
		}

		public function id() {
			return htmlentities($this->_id);
		}
	};

	class IssueManager {
		private $db;

		function __construct() {
			$this->db = new Database();
			$this->db->open();
		}

		function __destruct() {
			$this->db->close();
		}

		function insertNew($aImagePath, $aTag, $aAuthor, $aDescription) {
			$sql = "INSERT INTO Issue (image_path, tag, author, description)
				VALUES ("
				. "'" . $this->db->sanitize($aImagePath) . "', "
				. "'" . $this->db->sanitize($aTag) . "', "
				. "'" . $this->db->sanitize($aAuthor) . "', "
				. "'" . $this->db->sanitize($aDescription) . "'"
				. ")";

			return $this->db->query($sql);
		}
		
		function error() {
			return $this->db->error();
		}

		function all() {
			$sql = "SELECT * FROM Issue";
			return $this->db->query($sql);
		}
	}
?>
