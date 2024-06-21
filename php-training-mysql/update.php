<?php
require_once '../function/function.php';
checkLoggedIn();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<?php include 'updateI.php';?>
	<a href="read.php">Liste des données</a>
	<h1>Modifier : <?php echo $row['name']; ?></h1>
	<form action="" method="post">
		<div>
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $row['name']; ?>">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
			<?php echo "<option value='" . $row['difficulty'] . "'>" .  $row['difficulty'] . "</option>;" ?>
			<option value="très facile">Très facile</option>
			<option value="facile">Facile</option>
			<option value="moyen">Moyen</option>
			<option value="difficile">Difficile</option>
			<option value="très difficile">Très difficile</option>
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $row['distance']; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="<?php echo $row['duration']; ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $row['height_difference']; ?>">
		</div>
		<div>
			<label for="available">Available</label>
			<input type="text" name="available" value="<?php echo $row['available']; ?>">
		</div>
		<button type="submit" name="button">Envoyer</button>
	</form>
	<?php 
			

		
	?>
</body>
</html>
