<?php
	$dsn = "mysql:host=localhost;dbname=fashion_website";

	try{
		$pdo = new PDO($dsn, 'root', '');
	}
	catch(PDOException $d) {
		echo $e->getMessage();
	}
?>