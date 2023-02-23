<?php
session_start();
if (!isset($_SESSION['auth'])) {
	header('Location: ../login.php');
}
require 'database.php';

if (isset($_GET['id_subject']) && !empty($_GET['id_subject'])) {

	$idOfQuestion = $_GET['id_subject'];

	$checkIfQuestionExists = $BDD->prepare(
		"SELECT id_author
		FROM subjects
    WHERE id_subject = ?"
	);
	$checkIfQuestionExists->execute([$idOfQuestion]);

	if ($checkIfQuestionExists->rowCount() > 0) {

		// 
		$questionInfos = $checkIfQuestionExists->fetch();
		if ($questionInfos['id_author'] == $_SESSION['id_user']) {

			$deleteQuestion = $BDD->prepare(
				"DELETE FROM subjects WHERE id_subject = ?"
			);
			$deleteQuestion->execute([$idOfQuestion]);

			header('Location: ../myQuestions.php');
		} else {
			echo "Vous n'avez pas le droit de supprimer cette question";
		}
	}
} else {
	echo "Aucune question n'a été trouvée";
}
