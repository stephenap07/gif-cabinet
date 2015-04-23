<?php
	require_once('database.php');

	/**
	  +------------+---------+------+-----+---------+----------------+
	  | Field      | Type    | Null | Key | Default | Extra          |
	  +------------+---------+------+-----+---------+----------------+
	  | comment_id | int(11) | NO   | PRI | NULL    | auto_increment |
	  | message    | text    | NO   |     | NULL    |                |
	  | issue_id   | int(11) | NO   |     | NULL    |                |
	  | profile_id | int(11) | NO   |     | NULL    |                |
	  +------------+---------+------+-----+---------+----------------+
	*/

	class Comment {
		private $_message;
		private $_issueId;
		private $_profileId;
		private $_id;
		private $_queryData;

		function __construct($queryData) {
			$this->_queryData = $queryData->fetch_assoc();
			$this->_message = $this->_queryData['message'];
			$this->_issueId = $this->_queryData['issue_id'];
			$this->_profileId = $this->_queryData['profile_id'];
			$this->_id = $this->_queryData['comment_id'];
		}
		
		public function message() {
			return htmlentities($this->_message);
		}

		public function issueId() {
			return htmlentities($this->_issueId);
		}

		public function profileId() {
			return htmlentities($this->_profileId);
		}

		public function id() {
			return htmlentities($this->_id);
		}
	};

	class CommentManager {
		private $db;

		function __construct() {
			$this->db = new Database();
			$this->db->open();
		}

		function __destruct() {
			$this->db->close();
		}

		function error() {
			return $this->db->error();
		}

		function all() {
			$sql = "SELECT * FROM Comment";
			return $this->db->query($sql);
		}

		function queryByIssue($issueId) {
			$sql = "SELECT * FROM Comment WHERE issue_id='"
				. $this->db->sanitize($issueId) . "'";
			return $this->db->query($sql);
		}

		function queryByID($id) {
			$sql = "SELECT * FROM Comment WHERE comment_id='"
				. $this->db->sanitize($id) . "'";
			return $this->db->query($sql);
		}
	}
?>
