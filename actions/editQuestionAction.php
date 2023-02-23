<?php

if (isset($_POST['validate'])) {
	if (!empty($_POST['title']) && !empty($_POST['content'])) {

		$new_title_subject = htmlspecialchars($_POST['title']);
		$new_content_subject = nl2br(htmlspecialchars($_POST['content']));

		$editQuestionOnWebsite = $BDD->prepare(
			"UPDATE subjects 
            SET title_subject = ?, content_subject = ? 
            WHERE id_subject = ?"
		);
		$editQuestionOnWebsite->execute([
			$new_title_subject,
			$new_content_subject,
			$idOfQuestion,
		]);

		header('Location: myQuestions.php');

		$success = "Votre sujet a bien été modifiée";
	} else {
		$error = "Veuiller compléter tous les champs svp ...";
	}
}
