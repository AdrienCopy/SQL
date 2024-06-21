<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'root');
    $query = 'SELECT * FROM Météo';
    $result = $bdd->prepare($query);
    $result->execute();
    echo "<table style='border: 1px solid; width: 100%;'>";
    echo "<tr><th>Delete</th><th>Ville</th><th>Haut</th><th>Bas</th></tr>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>";
        echo "<form method='post' action=''>";
        echo "<input type='hidden' name='id' value='{$row['id']}'>";
        echo "<input type='checkbox' name='delete' onChange='this.form.submit()'>";
        echo "</form>";
        echo "</td>";
        echo "<td>" . htmlspecialchars($row['ville'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['haut'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['bas'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
catch(PDOException $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['ville']) && isset($_POST['haut']) && isset($_POST['bas'])) {
        $ville = $_POST['ville'];
        $haut = $_POST['haut'];
        $bas = $_POST['bas'];
        add($ville, $haut, $bas);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }    
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    deleteCity($id, $bdd);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

function add($ville, $haut, $bas) {
    $bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $bdd->prepare('INSERT INTO Météo (ville, haut, bas) VALUES (:ville, :haut, :bas)');
    $stmt->bindValue(':ville', $ville, PDO::PARAM_STR);
    $stmt->bindValue(':haut', $haut, PDO::PARAM_STR);
    $stmt->bindValue(':bas', $bas, PDO::PARAM_STR);
    $stmt->execute();
}

function deleteCity($id, $bdd) {
    $stmt = $bdd->prepare('DELETE FROM Météo WHERE id = :id');
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
}
?>

<form method="post" action="index.php">
            <label for="ville">Ville</label><br>
            <input type="text" name="ville"><br>
            <label for="haut">Haut</label><br>
            <input type="text" name="haut"><br>
            <label for="bas">Bas</label><br>
            <input type="text" name="bas"><br>
            <input type="submit" value="Enregister">
        </form>
</body>
</html>

