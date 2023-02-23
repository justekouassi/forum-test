<?php
require 'actions/database.php';

// Validation du formulaire
if (isset($_POST['validate'])) {

	// Vérifier si l'utilisateur a bien complété tous les champs
	if (!empty($_POST['pseudo']) && !empty($_POST['password'])) {
		$pseudo_user = htmlspecialchars($_POST['pseudo']);
		$passwd_user = htmlspecialchars($_POST['password']);

		// Vérifier si l'utilisateur existe
		$checkIfUserExists = $BDD->prepare("SELECT * FROM users WHERE pseudo_user = ?");
		$checkIfUserExists->execute(array($pseudo_user));

		if ($checkIfUserExists->rowCount() > 0) {

			// Vérifier si l'utilisateur a entré un bon mot de passe
			$userInfos = $checkIfUserExists->fetch();
			if (password_verify($passwd_user, $userInfos['passwd_user'])) {

				// Authentifier l'utilisateur sur le site et récupérer ses données dans des varibles globales de session
				$_SESSION['auth'] = true;
				$_SESSION['id_user'] = $userInfos['id_user'];
				$_SESSION['pseudo_user'] = $userInfos['pseudo_user'];
				$_SESSION['firstname_user'] = $userInfos['firstname_user'];
				$_SESSION['lastname_user'] = $userInfos['lastname_user'];

				// Aller à la page d'accueil
				header('Location: index.php');
			} else {
				$error = "Votre mot de passe est incorrect";
			}
		} else {
			$error = "Votre pseudo est incorrect";
		}
	} else {
		$error = "Veuiller compléter tous les champs svp ...";
	}
}
