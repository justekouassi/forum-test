<?php
require 'actions/showQuestionsAction.php';
require 'actions/securityAction.php';
?>

<!DOCTYPE html>
<html lang="fr-FR">
<?php include 'includes/head.php'; ?>

<body>
	<?php include 'includes/navbar.php'; ?>
	<br><br>

	<div class="container">
		<form method="GET">
			<div class="form-group row">
				<div class="col-8">
					<input type="search" name="search" class="form-control">
				</div>
				<div class="col-4">
					<button class="btn btn-success" type="submit">Rechercher</button>
				</div>
			</div>
		</form>
	</div>
	<br>
	<div class="container">
		<?php
		while ($question = $getAllQuestions->fetch()) {
		?>
			<div class="card">
				<a href="question.php?id_subject=<?= $question['id_subject']; ?>">
					<h5 class="card-header"><?= $question['title_subject']; ?></h5>
				</a>
				<div class="card-body">
					<p class="card-text"><?= $question['content_subject']; ?></p>
				</div>
				<h6 class="card-header">
					Publié par
					<a href="profile.php?id_user=<?= $question['id_author']; ?>">
						<?= $question['pseudo_author']; ?>
					</a>
					le <?= $question['date_publication']; ?>
				</h6>
			</div>
			<br>
		<?php
		}
		?>
	</div>

</body>

</html>