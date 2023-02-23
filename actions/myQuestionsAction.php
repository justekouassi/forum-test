<?php
require 'actions/database.php';

$getMyQuestions = $BDD->prepare(
	"SELECT id_subject, title_subject, content_subject 
	FROM subjects 
	WHERE id_author = ? 
	ORDER BY id_subject DESC"
);
$getMyQuestions->execute([$_SESSION['id_user']]);
