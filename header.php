<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=mini_blog;charset=utf8', 'root', '');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Mini-Blog</title>
</head>
<body>
