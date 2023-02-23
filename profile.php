<?php
require 'actions/showUserProfileAction.php';

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
		if (isset($getSomeoneQuestions)) {
		?>
			<div class="card">
				<div class="card-body">
					<h5 class="card-text">@<?= $pseudo_user; ?></h5>
					<hr>
					<p><?= $lastname_user . ' ' . $firstname_user; ?></p>
				</div>
			</div>
			<br>
			<?php
			while ($question = $getSomeoneQuestions->fetch()) {
			?>
				<div class="card">
					<a href="question.php?id_subject=<?= $question['id_subject']; ?>">
						<h5 class="card-header"><?= $question['title_subject']; ?></h5>
					</a>
					<div class="card-body">
						<p class="card-text"><?= $question['content_subject']; ?></p>
					</div>
					<div class="card-footer">
						<?= $question['date_publication']; ?>
					</div>
				</div>
				<br>
		<?php
			}
		}
		?>
	</div>
</body>

</html>