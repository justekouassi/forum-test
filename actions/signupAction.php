<?php
require 'actions/database.php';

// Validation du formulaire
if (isset($_POST['validate'])) {

	// Vérifier si l'utilisateur a bien complété tous les champs
	if (!empty($_POST['pseudo']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password'])) {
		$pseudo_user = htmlspecialchars($_POST['pseudo']);
		$firstname_user = htmlspecialchars($_POST['firstname']);
		$lastname_user = htmlspecialchars($_POST['lastname']);
		$passwd_user = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$checkIfUserAlreadyExists = $BDD->prepare("SELECT pseudo_user FROM users WHERE pseudo_user = ?");
		$checkIfUserAlreadyExists->execute(array($pseudo_user));

		if ($checkIfUserAlreadyExists->rowCount() == 0) {

			// Insérer l'utilisateur dans la base de données
			$insertUserOnWebsite = $BDD->prepare(
				"INSERT INTO users(pseudo_user, firstname_user, lastname_user, passwd_user) VALUES(?, ?, ?, ?)"
			);
			$insertUserOnWebsite->execute(array($pseudo_user, $firstname_user, $lastname_user, $passwd_user));

			// Récupérer les informations de l'utilisateur
			$getInfoUser = $BDD->prepare("SELECT id_user, pseudo_user, firstname_user, lastname_user FROM users WHERE pseudo_user = ? AND firstname_user = ? AND lastname_user = ?");
			$getInfoUser->execute(array($pseudo_user, $firstname_user, $lastname_user));
			$userInfos = $getInfoUser->fetch();

			// Authentifier l'utilisateur sur le site et récupérer ses données dans des varibles globales de session
			$_SESSION['auth'] = true;
			$_SESSION['id_user'] = $userInfos['id_user'];
			$_SESSION['pseudo_user'] = $userInfos['pseudo_user'];
			$_SESSION['firstname_user'] = $userInfos['firstname_user'];
			$_SESSION['lastname_user'] = $userInfos['lastname_user'];

			// Aller à la page d'accueil
			header('Location: index.php');
		} else {
			$error = "L'utilisateur existe déjà sur le site ...";
		}
	} else {
		$error = "Veuiller compléter tous les champs svp ...";
	}
}
