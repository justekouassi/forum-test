<?php
require 'actions/database.php';


if (isset($_GET['id_subject']) && !empty(isset($_GET['id_subject']))) {
	$idOfQuestion = $_GET['id_subject'];
	$checkIfQuestionExists = $BDD->prepare("SELECT * FROM subjects WHERE id_subject = ?");
	$checkIfQuestionExists->execute([$idOfQuestion]);

	if ($checkIfQuestionExists->rowCount() > 0) {

		$questionInfos = $checkIfQuestionExists->fetch();
		if ($questionInfos['id_author'] == $_SESSION['id_user']) {

			$question_title = $questionInfos['title_subject'];
			$question_content = $questionInfos['content_subject'];
			$question_content = str_replace('<br />', '', $question_content);
		} else {
			$error = "Vous n'êtes pas l'auteur de cette question. Petit malin :)";
		}
	} else {
		$error = "Aucun sujet n'a été trouvé";
	}
} else {
	$error = "Aucun sujet n'a été trouvé";
}
