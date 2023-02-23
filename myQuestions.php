<?php
include 'actions/myQuestionsAction.php';
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
		while ($question = $getMyQuestions->fetch()) {
		?>
			<div class="card">
				<a href="question.php?id_subject=<?= $question['id_subject']; ?>">
					<h5 class="card-header"><?= $question['title_subject']; ?></h5>
				</a>
				<div class="card-body">
					<p class="card-text"><?= $question['content_subject']; ?></p>
					<!-- <a href="#" class="btn btn-primary">Accéder à la question</a> -->
					<a href="editQuestion.php?id_subject=<?= $question['id_subject']; ?>" class="btn btn-secondary">Modifier la question</a>
					<a href="actions/deleteQuestionAction.php?id_subject=<?= $question['id_subject']; ?>" class="btn btn-danger">Supprimer la question</a>
				</div>
			</div>
		<?php
		}
		?>
	</div>

</body>

</html>