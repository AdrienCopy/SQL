<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=rando;charset=utf8', 'root', 'root');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $bdd->prepare('DELETE FROM hiking WHERE id = :id');
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $result = $stmt->execute();
            if ($result) {
                header("Location: read.php");
                exit();
            } else {
                echo "Erreur lors de la suppression de l'utilisateur.";
            }
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        } else {
            echo "ID de randonnée non spécifié.";
        }

       
    }

?>
