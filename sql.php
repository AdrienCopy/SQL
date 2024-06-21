<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="sql.php" method="post">
    <label for="requete">Sélectionnez une requête :</label>
    <select name="requete" id="requete">
        <option value="1">Affiche toutes les données</option>
        <option value="2">Affiche uniquement les prénoms</option>
        <option value="3">Affiche les prénoms, les dates de naissance et l’école de chacun</option>
        <option value="4">Affiche uniquement les élèves qui sont de sexe féminin</option>
        <option value="5">Affiche uniquement les élèves qui sont de sexe masculin</option>
        <option value="6">Affiche uniquement les élèves qui font partie de l’école d'Addy</option>
        <option value="7">Affiche uniquement les prénoms des étudiants, par ordre inverse à l’alphabet</option>
        <option value="8">Affiche uniquement les prénoms des étudiants, par ordre inverse à l’alphabet en limitant les résultats à 2.</option>
        <option value="9">Ajoute Ginette Dalor, née le 01/01/1930 et affecte-la à Bruxelles</option>
        <option value="10">Modifie Ginette et change son sexe et son prénom en “Omer”</option>
        <option value="11">Supprimer la personne dont l’ID est 3</option>
        <option value="12">Modifier Bruxelles devient Liege</option>
        <option value="13">Modifier Liege devient Bruxelles</option>
    </select>
    <button type="submit">Exécuter</button>
</form>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['requete'])) {
    $requete = $_POST['requete'];

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Lecture du contenu du fichier SQL
        $sql_file = 'requetes.sql';
        $sql_content = file_get_contents($sql_file);

        // Extraction de la requête SQL correspondant à la sélection
        if (preg_match("/-- Requête $requete:(.*?);/s", $sql_content, $matches)) {
            $query = trim($matches[1]);

            $stmt = $bdd->query($query);

            if ($stmt->rowCount() > 0) {
                echo "<table border='1' width='100%'>";
                echo "<tr>";
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                foreach ($row as $column => $value) {
                    echo "<th>" . htmlspecialchars($column) . "</th>";
                }
                echo "</tr>";
                do {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "</tr>";
                } while ($row = $stmt->fetch(PDO::FETCH_ASSOC));
        
                echo "</table>";
            } else {
                echo "Aucun résultat trouvé.";
            }
        } else {
            echo "Requête non trouvée.";
        }

    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>



</body>
</html>