<?php
// require 'actions/publishAnswerAction.php';
require 'actions/showAllAnswersFromQuestionAction.php';
?>

<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>

<body>
	<?php include 'includes/navbar.php'; ?>
	<br><br>

	<div class="container">
		<?php
		if (isset($error)) {
			echo $error;
		}

		if (isset($question_date_publication)) {
		?>
			<section class="show-content">
				<h3><?= $question_title; ?></h3><br>
				<p><?= $question_content; ?></p>
				<hr>
				<small><?= $question_pseudo_author . ' ' . $question_date_publication; ?></small>
			</section>
			<br>

			<section class="show-answers">
				<form class="form-group" method="POST">
					<div class="mb-3">
						<label for="answer" class="form-label">Réponse : </label>
						<textarea name="answer" class="form-control"></textarea><br>
						<button class="btn btn-primary" type="submit" name="validate">Répondre</button>
					</div>
				</form>
				<?php
				while ($answer = $getAllAnswersOfQuestion->fetch()) {
				?>
					<div class="card">
						<a href="profile.php?id_user=<?= $answer['id_author']; ?>">
							<h5 class="card-header"><?= $answer['pseudo_author']; ?></h5>
						</a>
						<div class="card-body">
							<p class="card-text"><?= $answer['content_answer']; ?></p>
						</div>
					</div><br>
				<?php
				}
				?>
			</section>

		<?php
		}
		?>
	</div>

</body>

</html>