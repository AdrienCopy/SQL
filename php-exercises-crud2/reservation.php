<?php 
require_once 'function/function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <header>
        <a href="index.php">Home</a>
    </header>
    <main>
        <section>
        <form action="" method="get">
            <label for="client">Selectionner un client :</label>
            <select name="client" id="client">
                <?php selectClient(); ?>
            </select>
            <button type="submit" name="button">Selectionner</button>
        </form>
        </section>
        <section>
        <?php
        $client = null;
        $clientId = isset($_GET['client']) ? (int)$_GET['client'] : null;
        $client = $clientId;
        affiche($client); 
        ?>
        </section>
        <section>
        <?php
        $client = null;
        $clientId = isset($_GET['client']) ? (int)$_GET['client'] : null;
        $client = $clientId;
        afficheCommande($client); 
        ?>
        </section>

    </main>
    
</body>
</html>