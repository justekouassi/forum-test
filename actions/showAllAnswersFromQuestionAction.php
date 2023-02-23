<?php
require 'publishAnswerAction.php';
// require 'showQuestionContentAction.php';

$getAllAnswersOfQuestion = $BDD->prepare("SELECT * FROM answers WHERE id_subject = ?");
$getAllAnswersOfQuestion->execute([$idOfQuestion]);