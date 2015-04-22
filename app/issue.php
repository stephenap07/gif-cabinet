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

		function __construct($imagePath, $tag, $author, $description) {
			$this->_imagePath = $imagePath;
			$this->_tag = $tag;
			$this->_author = $author;
			$this->_description = $description;
		}
		
		public function imagePath() {
			return $this->_imagePath;
		}

		public function tag() {
			return $this->_tag;
		}

		public function author() {
			return $this->_author;
		}

		public function description() {
			return $this->_description;
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
	}
?>
