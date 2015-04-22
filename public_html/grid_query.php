<?php
	require_once('resources/config.php');
	require('../app/issue.php');

	if (!empty($_GET)) {
		$status = $_GET['status'];
		$issueManager = new IssueManager();
		if (strcmp($status, "view_all") == 0) {
			$result = $issueManager->all();
		} else {
			$result = $issueManager->queryByTag($status);
		}
		$numInRow = 0;
		$max = $result->num_rows;
		for ($x = 0; $x < $max; $x++) {
			$issue = new Issue($result);
			if ($numInRow == 0){
				echo("<div class='container-fluid'>");
				echo("<div class='row gif-row'>");
			}
			include(TEMPLATES_PATH . '/thumbnail.php');
			$numInRow++;
			if ($numInRow == 3 || $x == $max){
				echo("</div>");
				echo("</div>");
				$numInRow = 0;
			}
		}
	}
?>
