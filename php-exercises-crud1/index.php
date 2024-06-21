<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Clients</h2>
    <?php include 'client.php'?>
    <h2>les types de spectacles possibles</h2>
    <?php include 'showType.php'?>
    <h2>Les 20 premiers clients</h2>
    <?php include 'client20.php'?>
    <h2>Les clients possédant une carte de fidélité.</h2>
    <?php include 'cardNumber.php'?>
    <h2>Le nom de tous les clients dont le nom commence par la lettre "M".</h2>
    <?php include 'M.php'?>
    <h2>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure</h2>
    <?php include 'show.php'?>
    <h2>Afficher tous les clients comme ceci : </h2>
    <?php include 'client2.php'?>
</body>
</html>