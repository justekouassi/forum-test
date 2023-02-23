<?php
include 'actions/QuestionToEditAction.php';
include 'actions/editQuestionAction.php';
require 'actions/securityAction.php';
?>

<!DOCTYPE html>
<html lang="fr-FR">
<?php include 'includes/head.php'; ?>

<body>
	<?php include 'includes/navbar.php'; ?>

	<br><br>
	<div class="container">
		<?php
		if (isset($error)) {
			echo '<p style="color:red">' . $error . '</p>';
		}
		?>
		<?php
		if (isset($question_content)) {
		?>
			<form method="POST">
				<div class="mb-3">
					<label for="title" class="form-label">Sujet</label>
					<input type="text" class="form-control" name="title" value="<?= $question_title; ?>">
				</div>
				<div class="mb-3">
					<label for="content" class="form-label">Contenu du sujet</label>
					<textarea class="form-control" name="content"><?= $question_content; ?></textarea>
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1">Me notifier des réponses par mail</label>
				</div>
				<button type="submit" class="btn btn-primary" name="validate">Modifier le sujet</button>
				<br><br>
			</form>
		<?php
		}
		?>
	</div>

</body>

</html>