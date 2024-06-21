<?php
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$bdd = new PDO('mysql:host=localhost;dbname=rando;charset=utf8', 'root', 'root');

			$stmt = $bdd->prepare('SELECT * FROM hiking WHERE id = :id');
			$stmt->bindValue(':id', $id);
			$result = $stmt->execute();
			
			if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			} else {
				echo "L'utilisateur avec l'ID $id n'existe pas.";
			} 
		} else {
			echo "Aucun ID d'utilisateur spécifié.";
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (isset($_POST['id'])) {
				$id = $_POST['id'];
				$name = $_POST['name'];
				$difficulty = $_POST['difficulty'];
				$distance = $_POST['distance'];
				$duration = $_POST['duration'];
				$height_difference = ($_POST['height_difference']);
				$available = ($_POST['available']);

				try {
					$bdd = new PDO('mysql:host=localhost;dbname=rando;charset=utf8', 'root', 'root');
					$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
					$stmt = $bdd->prepare('UPDATE hiking SET name = :name, difficulty = :difficulty, distance = :distance, duration = :duration, height_difference = :height_difference, available = :available WHERE id = :id');
					$stmt->bindValue(':name', $name);
					$stmt->bindValue(':difficulty', $difficulty);
					$stmt->bindValue(':distance', $distance);
					$stmt->bindValue(':duration', $duration);
					$stmt->bindValue(':height_difference', $height_difference);
					$stmt->bindValue(':available', $available);
					$stmt->bindValue(':id', $id, PDO::PARAM_INT);
	
					$stmt->execute();
	
					echo "<pre>";
					echo "<p>La randonnée a été modifiée avec succès.</p>";
					echo "</pre>";
					header("Location: update.php?id=" . $id );
				} catch (PDOException $e) {
					echo 'Erreur : ' . $e->getMessage();
				}
			}
		}
?>