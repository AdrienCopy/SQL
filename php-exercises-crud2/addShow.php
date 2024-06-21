<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $performer = $_POST['performer'];
    $date = $_POST['date'];
    $showTypesId = $_POST['showTypesId'];
    $firstGenresId = $_POST['firstGenresId'];
    $secondGenreId = !empty($_POST['secondGenreId']) ? $_POST['secondGenreId'] : null;
    $duration = $_POST['duration'];
    $startTime = $_POST['startTime'];

    try {

        $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = 'INSERT INTO shows (title, performer, date, showTypesId, firstGenresId, secondGenreId, duration, startTime) 
                  VALUES (:title, :performer, :date, :showTypesId, :firstGenresId, :secondGenreId, :duration, :startTime)';
        $stmt = $bdd->prepare($query);
        
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':performer', $performer);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':showTypesId', $showTypesId);
        $stmt->bindParam(':firstGenresId', $firstGenresId);
        $stmt->bindParam(':secondGenreId', $secondGenreId, PDO::PARAM_INT);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':startTime', $startTime);

        $stmt->execute();

        header("Location: index.php");
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
    }
}
?>
