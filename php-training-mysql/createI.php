<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['name']) && isset($_POST['difficulty']) && isset($_POST['distance']) && isset($_POST['duration']) && isset($_POST['height_difference'])&& isset($_POST['available'])) {
	
			$name = $_POST['name'];
			$difficulty = $_POST['difficulty'];
			$distance = $_POST['distance'];
			$duration = $_POST['duration'];
			$height_difference = ($_POST['height_difference']);
			$available = $_POST['available'];
			Add($name, $difficulty, $distance, $duration, $height_difference, $available);
		}
	}

	function Add($name, $difficulty, $distance, $duration, $height_difference, $available) {
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=rando;charset=utf8', 'root', 'root');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			$stmt = $bdd->prepare('INSERT INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES (:name, :difficulty, :distance, :duration, :height_difference, :available)');
			$stmt->bindValue(':name', $name);
			$stmt->bindValue(':difficulty', $difficulty);
			$stmt->bindValue(':distance', $distance);
			$stmt->bindValue(':duration', $duration);
			$stmt->bindValue(':height_difference', $height_difference);
			$stmt->bindValue(':available', $available);

		$stmt->execute();
		echo "<pre>";
		echo "<p>La randonnée a été ajoutée avec succès.</p>";
		echo "</pre";

		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
		
	}
	?>