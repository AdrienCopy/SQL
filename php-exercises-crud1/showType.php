<?php
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT * FROM showTypes';
    $result = $bdd->prepare($query);
    $result->execute();
    echo "<table border='1' width='100%'>";
    echo "<tr><th>Type de spectacles</th></tr>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "</td>";
    echo "<td>" . htmlspecialchars($row['type'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "</tr>";
    }
    echo "</table>"
?>