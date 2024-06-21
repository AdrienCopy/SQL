<?php
require_once 'function/function.php';

$client = null;
$clientId = isset($_GET['client']) ? (int)$_GET['client'] : null;

if ($clientId) {
    $client = getClientById($clientId);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Formulaire pour modifier un client</h2>
    <form action="" method="get">
        <label for="client">Selectionner un client :</label>
        <select name="client" id="client">
            <?php selectClient(); ?>
        </select>
        <button type="submit" name="button">Selectionner</button>
    </form>
    <br>
    <?php if ($client): ?>
    <form action="updateClient.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8'); ?>">
        <label for="lastName">Nom</label><br>
        <input type="text" name="lastName" value="<?php echo htmlspecialchars($client['lastName'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>
        <label for="firstName">Prénom</label><br>
        <input type="text" name="firstName" value="<?php echo htmlspecialchars($client['firstName'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>
        <label for="birthDate">Date de naissance</label><br>
        <input type="date" name="birthDate" value="<?php echo htmlspecialchars($client['birthDate'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>
        <fieldset>
            <legend>Carte de fidélité</legend>
            <input type="radio" id="oui" name="card" value="1" <?php echo $client['card'] ? 'checked' : ''; ?>>
            <label for="oui">Oui</label><br>
            <input type="radio" id="non" name="card" value="0" <?php echo !$client['card'] ? 'checked' : ''; ?>>
            <label for="non">Non</label><br>
        </fieldset><br>
        <label for="cardNumber">Numéro de carte de fidélité</label><br>
        <input type="number" name="cardNumber" value="<?php echo htmlspecialchars($client['cardNumber'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>
        <button type="submit" name="button">Enregistrer</button>
    </form>
    <?php endif; ?>
</body>
</html>