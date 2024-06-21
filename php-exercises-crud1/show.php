<?php
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query = '  SELECT * 
            FROM shows
            ORDER BY performer ASC

';
$result = $bdd->prepare($query);
$result->execute();

echo "<table border='1' width='100%'>";
echo "<tr><th>Artiste</th><th>Spectacle</th><th>Date</th><th>Heure</th></tr>";
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "</td>";
    echo "<td>" . htmlspecialchars($row['performer'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row['startTime'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "</tr>";
}
echo "</table>"
?>