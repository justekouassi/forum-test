<?php
require 'actions/publishQuestionAction.php';
require 'actions/securityAction.php';
?>

<!DOCTYPE html>
<html lang="fr-FR">
<?php include 'includes/navbar.php'; ?>

<body>
	<?php include 'includes/head.php'; ?>

	<br><br>
	<form class="container" method="POST">

		<?php
		if (isset($error)) {
			echo '<p style="color:red">' . $error . '</p>';
		} elseif (isset($success)) {
			echo '<p style="color:green">' . $success . '</p>';
		}
		?>

		<div class="mb-3">
			<label for="title" class="form-label">Sujet</label>
			<input type="text" class="form-control" name="title">
		</div>
		<div class="mb-3">
			<label for="content" class="form-label">Contenu du sujet</label>
			<textarea class="form-control" name="content"></textarea>
		</div>
		<div class="mb-3 form-check">
			<input type="checkbox" class="form-check-input" id="exampleCheck1">
			<label class="form-check-label" for="exampleCheck1">Me notifier des réponses par mail</label>
		</div>
		<button type="submit" class="btn btn-primary" name="validate">Publier le sujet</button>
		<br><br>
	</form>
</body>

</html>