<?php require 'actions/signupAction.php'; ?>

<!DOCTYPE html>
<html lang="fr-FR">
<?php include 'includes/head.php'; ?>

<body>

	<br><br>
	<form class="container" method="POST">

		<?php
		if (isset($error)) {
			echo '<p style="color:red">' . $error . '</p>';
		}
		?>

		<div class="mb-3">
			<label for="pseudo" class="form-label">Pseudo</label>
			<input type="text" class="form-control" name="pseudo">
		</div>
		<div class="mb-3">
			<label for="prenom" class="form-label">Prénoms</label>
			<input type="text" class="form-control" name="firstname">
		</div>
		<div class="mb-3">
			<label for="nom" class="form-label">Nom</label>
			<input type="text" class="form-control" name="lastname">
		</div>
		<div class="mb-3">
			<label for="password" class="form-label">Mot de passe</label>
			<input type="password" class="form-control" name="password">
		</div>
		<button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
		<br><br>
		<p><a href="login.php">J'ai déjà un compte. Je me connecte</a></p>
	</form>
</body>

</html>