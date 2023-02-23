<?php
require 'actions/database.php';

if (isset($_GET['id_subject']) && !empty($_GET['id_subject'])) {

	$idOfQuestion = $_GET['id_subject'];
	$checkIfQuestionExists = $BDD->prepare("SELECT * FROM subjects WHERE id_subject = ?");
	$checkIfQuestionExists->execute([$idOfQuestion]);

	if ($checkIfQuestionExists->rowCount() > 0) {

		$questionInfos = $checkIfQuestionExists->fetch();

		$question_title = $questionInfos['title_subject'];
		$question_content = $questionInfos['content_subject'];
		$question_content = str_replace('<br />', '', $question_content);
		$question_id_author = $questionInfos['id_author'];
		$question_pseudo_author = $questionInfos['pseudo_author'];
		$question_date_publication = $questionInfos['date_publication'];
	} else {
		$error = "Aucun sujet n'a été trouvé";
	}
} else {
	$error = "Aucun sujet n'a été trouvé";
}
