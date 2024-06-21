<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $performer = $_POST['performer'];
    $date = $_POST['date'];
    $showTypesId = $_POST['showTypesId'];
    $firstGenresId = $_POST['firstGenresId'];
    $secondGenreId = !empty($_POST['secondGenreId']) ? $_POST['secondGenreId'] : null;
    $duration = $_POST['duration'];
    $startTime = $_POST['startTime'];

    updateShow($id, $title, $performer, $date, $showTypesId, $firstGenresId, $secondGenreId, $duration, $startTime);
}

function updateShow($id, $title, $performer, $date, $showTypesId, $firstGenresId, $secondGenreId, $duration, $startTime) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $bdd->prepare('UPDATE shows SET title = :title, performer = :performer, date = :date, showTypesId = :showTypesId, firstGenresId = :firstGenresId, secondGenreId = :secondGenreId, duration = :duration, startTime = :startTime WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':performer', $performer);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':showTypesId', $showTypesId, PDO::PARAM_INT);
        $stmt->bindValue(':firstGenresId', $firstGenresId, PDO::PARAM_INT);
        $stmt->bindValue(':secondGenreId', $secondGenreId, PDO::PARAM_INT);
        $stmt->bindValue(':duration', $duration);
        $stmt->bindValue(':startTime', $startTime);

        $stmt->execute();
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
