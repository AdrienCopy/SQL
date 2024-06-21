<?php
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT * FROM clients';
    $result = $bdd->prepare($query);
    $result->execute();
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "Nom : " . $row['lastName'] . "<br>";
        echo "Prénom : " . $row['firstName'] . "<br>";
        echo "Date de naissance : " . $row['birthDate'] . "<br>";
        echo "Carte de fidélité : " . $row['card'] . "<br>";
        echo "Numéro de carte : " . $row['cardNumber'] . "<br><br>";
    }

?>