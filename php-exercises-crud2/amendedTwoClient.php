<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once 'function/function.php';

$client = null;
$client2 = null;

if (isset($_GET['client'])) {
    $clientId = (int)$_GET['client'];
    $client = getClientById($clientId);
    $_SESSION['client'] = $client;
} elseif (isset($_SESSION['client'])) {
    $client = $_SESSION['client'];
}

if (isset($_GET['client2'])) {
    $clientId2 = (int)$_GET['client2'];
    $client2 = getClientById($clientId2);
    $_SESSION['client2'] = $client2;
} elseif (isset($_SESSION['client2'])) {
    $client2 = $_SESSION['client2'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un client</title>
</head>
<body>
    <h2>Formulaire pour modifier deux clients</h2>
    <form action="" method="get">
        <label for="client">Sélectionner un client :</label>
        <select name="client" id="client">
            <?php selectClient($clientId); ?>
        </select>
        <button type="submit" name="button">Sélectionner</button>
    </form>
    <form action="" method="get">
        <label for="client2">Sélectionner un deuxième client :</label>
        <select name="client2" id="client2">
            <?php selectClient($clientId2); ?>
        </select>
        <button type="submit" name="button">Sélectionner</button>
    </form>
    <br>
    <div style="display: flex; gap: 20px;">
        <?php if ($client): ?>
        <form action="updateClient.php" method="post" style="border-radius: 15px; border: 1px solid #ccc; padding: 10px;">
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
        <?php if ($client2): ?>
        <form action="updateClient.php" method="post" style="border-radius: 15px; border: 1px solid #ccc; padding: 10px;">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($client2['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <label for="lastName">Nom</label><br>
            <input type="text" name="lastName" value="<?php echo htmlspecialchars($client2['lastName'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>
            <label for="firstName">Prénom</label><br>
            <input type="text" name="firstName" value="<?php echo htmlspecialchars($client2['firstName'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>
            <label for="birthDate">Date de naissance</label><br>
            <input type="date" name="birthDate" value="<?php echo htmlspecialchars($client2['birthDate'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>
            <fieldset>
                <legend>Carte de fidélité</legend>
                <input type="radio" id="oui" name="card" value="1" <?php echo $client2['card'] ? 'checked' : ''; ?>>
                <label for="oui">Oui</label><br>
                <input type="radio" id="non" name="card" value="0" <?php echo !$client2['card'] ? 'checked' : ''; ?>>
                <label for="non">Non</label><br>
            </fieldset><br>
            <label for="cardNumber">Numéro de carte de fidélité</label><br>
            <input type="number" name="cardNumber" value="<?php echo htmlspecialchars($client2['cardNumber'], ENT_QUOTES, 'UTF-8'); ?>"><br><br>
            <button type="submit" name="button">Enregistrer</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
