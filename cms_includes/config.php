<?php
try
{
	$pdo = new PDO('mysql:host=localhost;dbname=thelibrary', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->exec('SET NAMES "utf8"');
}
catch (PDOException $e)
{
	echo "Nie można połączyć się z bazą danych.";
}
?>