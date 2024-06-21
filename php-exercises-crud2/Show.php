<?php
require_once 'function/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Formulaire pour ajouter un spectacle</h2>
        <form action="addShow.php" method="post">
            <label for="title">Titre</label><br>
            <input type="text" id="title" name="title" required><br><br>
            
            <label for="performer">Artiste</label><br>
            <input type="text" id="performer" name="performer" required><br><br>
            
            <label for="date">Date</label><br>
            <input type="date" id="date" name="date" required><br><br>
            
            <label for="showTypesId">Type de spectacle</label><br>
            <select id="showTypesId" name="showTypesId" required>
                <?php showTypes() ?>
            </select><br><br>
            
            <label for="firstGenresId">Genre 1</label><br>
            <select id="firstGenresId" name="firstGenresId" required>
                <?php showGenres() ?>
            </select><br><br>
            
            <label for="secondGenreId">Genre 2</label><br>
            <select id="secondGenreId" name="secondGenreId">
                <?php showGenres() ?>
            </select><br><br>
            
            <label for="duration">Durée</label><br>
            <input type="time" id="duration" name="duration" required><br><br>
            
            <label for="startTime">Heure de début</label><br>
            <input type="time" id="startTime" name="startTime" required><br><br>
            
            <button type="submit">Enregistrer</button>
        </form>
</body>
</html>
