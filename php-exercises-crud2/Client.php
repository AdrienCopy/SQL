<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Formulaire pour ajouter un client</h2>
    <form action="addClient.php" method="post">
        <label for="lastName">Nom</label><br>
        <input type="text" name="lastName"><br>
        <br>
        <label for="firstName">Prénom</label><br>
        <input type="text" name="firstName"><br>
        <br>
        <label for="birthDate">Date de naissance</label><br>
        <input type="date" name="birthDate"><br>
        <br>
        <fieldset>
        <legend>Carte de fidélité</legend>
        <input type="radio" id="oui" name="card" value="1">
        <label for="oui">Oui</label><br>
        <input type="radio" id="non" name="card" value="0">
        <label for="non">Non</label><br>
        </fieldset>
        <br>
        <label for="cardNumber">Numéro de carte de fidélité</label><br>
        <input type="number" name="cardNumber"><br>
        <br>
        <button type="submit" name="button">Enregister</button>
      </div>
    </form>
</body>
</html>