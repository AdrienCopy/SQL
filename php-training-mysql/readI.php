<?php 
        $bdd = new PDO('mysql:host=localhost;dbname=rando;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT * FROM hiking';
        $result = $bdd->prepare($query);
        $result->execute();
        echo "<table border='1' width='100%'>";
        echo "<tr><th>ID</th><th>Name</th><th>Difficulty</th><th>Distance</th><th>Duration</th><th>Height_difference</th><th>available</th><th>Update</th><th>Delete</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          echo "</td>";
          echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
          echo "<td>" . htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8') . "</td>";
          echo "<td>" . htmlspecialchars($row['difficulty'], ENT_QUOTES, 'UTF-8') . "</td>";
          echo "<td>" . htmlspecialchars($row['distance'], ENT_QUOTES, 'UTF-8') . "</td>";
          echo "<td>" . htmlspecialchars($row['duration'], ENT_QUOTES, 'UTF-8') . "</td>";
          echo "<td>" . htmlspecialchars($row['height_difference'], ENT_QUOTES, 'UTF-8') . "</td>";
          echo "<td>" . htmlspecialchars($row['available'], ENT_QUOTES, 'UTF-8') . "</td>";
          echo "<td><a class='action-link' href='update.php?id=" . htmlspecialchars($row['id']) . "'>Modifier</a></td>";
          echo "<td><a class='action-link' href='delete.php?id=" . htmlspecialchars($row['id']) . "'>Supprimer</a></td>";
          echo "</tr>";
          echo "<tr><td colspan='4'><pre>";
        print_r($bdd);
        echo "</pre></td></tr>";
        }
        echo "</table>"
      ?>