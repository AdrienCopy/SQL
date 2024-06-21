<?php
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT * 
          FROM clients
          WHERE lastName LIKE \'m%\'
          ORDER BY lastName ASC
         ';
    $result = $bdd->prepare($query);
    $result->execute();
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "Nom : " . $row['lastName'] . "<br>";
        echo "Prénom : " . $row['firstName'] . "<br><br>";
    }
?>