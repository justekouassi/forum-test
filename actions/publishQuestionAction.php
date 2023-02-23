<?php
require 'actions/database.php';

// Validation du formulaire
if (isset($_POST['validate'])) {

	// Vérifier si l'utilisateur a bien complété tous les champs
	if (!empty($_POST['title']) && !empty($_POST['content'])) {

		$title_subject = htmlspecialchars($_POST['title']);
		$content_subject = nl2br(htmlspecialchars($_POST['content']));
		$id_author = $_SESSION['id_user'];
		$pseudo_author = $_SESSION['pseudo_user'];
		$date_publication = date('d-m-Y H:i');

		$insertQuestionOnWebsite = $BDD->prepare(
			"INSERT INTO subjects(title_subject, content_subject, id_author, pseudo_author, date_publication) 
            VALUES(?, ?, ?, ?, ?)"
		);
		$insertQuestionOnWebsite->execute([
			$title_subject,
			$content_subject,
			$id_author,
			$pseudo_author,
			$date_publication,
		]);

		$success = "Votre sujet a bien été publié";
	} else {
		$error = "Veuiller compléter tous les champs svp ...";
	}
}
