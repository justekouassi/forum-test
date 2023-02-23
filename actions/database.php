<?php
$DB_DSN = "mysql:host=localhost;dbname=juste1996196_4jv0ei";
$DB_USER = "juste1996196";
$DB_PASS = "Gs8le+boDlat_R";
$options =
	[
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	];

try {
	session_start();
	$BDD = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);
} catch (PDOException $pe) {
	echo "Erreur : " . $pe->getMessage();
}
