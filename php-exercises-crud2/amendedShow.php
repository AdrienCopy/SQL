<?php
require_once 'function/function.php';

$show = null;
$showId = isset($_GET['show']) ? (int)$_GET['show'] : null;

if ($showId) {
    $show = getShowById($showId);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Formulaire pour modifier un spectacle</h2>
    <form action="" method="get">
        <label for="show">Selectionner un spectacle :</label>
        <select name="show" id="show">
            <?php selectShow(); ?>
        </select>
        <button type="submit" name="button">Selectionner</button>
    </form>
        <br><br>
        <?php if ($show): ?>
            <form action="updateShow.php" method="post">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($show['id'], ENT_QUOTES, 'UTF-8'); ?>">
                
                <label for="title">Titre</label><br>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($show['title'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
                
                <label for="performer">Artiste</label><br>
                <input type="text" id="performer" name="performer" value="<?php echo htmlspecialchars($show['performer'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
                
                <label for="date">Date</label><br>
                <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($show['date'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
                
                <label for="showTypesId">Type de spectacle</label><br>
                <select id="showTypesId" name="showTypesId" required>
                    <?php showTypes($show['showTypesId']); ?>
                </select><br><br>
                
                <label for="firstGenresId">Genre 1</label><br>
                <select id="firstGenresId" name="firstGenresId" required>
                    <?php showGenres($show['firstGenresId']); ?>
                </select><br><br>
                
                <label for="secondGenreId">Genre 2</label><br>
                <select id="secondGenreId" name="secondGenreId">
                    <?php showGenres($show['secondGenreId']); ?>
                </select><br><br>
                
                <label for="duration">Durée</label><br>
                <input type="time" id="duration" name="duration" value="<?php echo htmlspecialchars($show['duration'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
                
                <label for="startTime">Heure de début</label><br>
                <input type="time" id="startTime" name="startTime" value="<?php echo htmlspecialchars($show['startTime'], ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
                
                <button type="submit">Enregistrer</button>
            </form>
        <?php endif; ?>

    
    <br>
</body>
</html>