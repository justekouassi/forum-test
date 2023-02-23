<?php require 'actions/loginAction.php'; ?>

<!DOCTYPE html>
<html lang="fr">
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
			<label for="password" class="form-label">Mot de passe</label>
			<input type="password" class="form-control" name="password">
		</div>
		<button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
		<br><br>
		<p><a href="signup.php">Je n'ai pas de compte. Je m'inscris</a></p>
	</form>
</body>

</html>