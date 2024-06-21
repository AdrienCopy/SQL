<?php
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = '  SELECT * 
                FROM clients
                WHERE cardNumber IS NOT NULL
                ';
    $result = $bdd->prepare($query);
    $result->execute();
    echo "<table border='1' width='100%'>";
    echo "<tr><th>ID</th><th>Last Name</th><th>First Name</th><th>birthday</th><th>Card</th><th>Card Number</th></tr>";
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "</td>";
    echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row['lastName'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row['firstName'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row['birthDate'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row['card'], ENT_QUOTES, 'UTF-8') . "</td>";
    echo "<td>" . htmlspecialchars($row['cardNumber'] ?? '', ENT_QUOTES, 'UTF-8') . "</td>";
    echo "</tr>";
    }
    echo "</table>"
?>