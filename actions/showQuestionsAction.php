<?php
require 'actions/database.php';

$getAllQuestions = $BDD->query("SELECT * FROM subjects ORDER BY id_subject DESC");

if (isset($_GET['search']) && !empty($_GET['search'])) {

	$userSearch = $_GET['search'];
	$getAllQuestions = $BDD->query(
		"SELECT * FROM subjects 
		WHERE title_subject 
		LIKE '%" . $userSearch . "%' ORDER BY id_subject DESC"
	);
}
