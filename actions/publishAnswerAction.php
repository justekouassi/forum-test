<?php
require 'actions/showQuestionContentAction.php';

if (isset($_POST['validate'])) {

	// Vérifier si l'utilisateur a bien complété tous les champs
	if (!empty($_POST['answer'])) {

		$content_answer = nl2br(htmlspecialchars($_POST['answer']));
		$id_author = $_SESSION['id_user'];
		$pseudo_author = $_SESSION['pseudo_user'];
		$date_publication = date('d-m-Y H:i');

		$insertAnswer = $BDD->prepare(
			"INSERT INTO answers(content_answer, id_author, pseudo_author, date_publication, id_subject) 
      VALUES(?, ?, ?, ?, ?)"
		);
		$insertAnswer->execute([
			$content_answer,
			$id_author,
			$pseudo_author,
			$date_publication,
			$idOfQuestion,
		]);

		$success = "Votre sujet a bien été publié";
	} else {
		$error = "Veuiller compléter tous les champs svp ...";
	}
}
