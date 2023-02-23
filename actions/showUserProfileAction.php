<?php
require 'actions/database.php';

if (isset($_GET['id_user']) && !empty($_GET['id_user'])) {

	$idOfUser = $_GET['id_user'];
	$checkIfuserExists = $BDD->prepare("SELECT * FROM users WHERE id_user = ?");
	$checkIfuserExists->execute([$idOfUser]);

	if ($checkIfuserExists->rowCount() > 0) {

		$userInfos = $checkIfuserExists->fetch();
		$pseudo_user = $userInfos['pseudo_user'];
		$firstname_user = $userInfos['firstname_user'];
		$lastname_user = $userInfos['lastname_user'];

		$getSomeoneQuestions = $BDD->prepare("SELECT * FROM subjects WHERE id_author = ?");
		$getSomeoneQuestions->execute([$idOfUser]);
	} else {
		$error = "Aucun user trouvé";
	}
} else {
	$error = "Aucun utilisateur trouvé";
}
