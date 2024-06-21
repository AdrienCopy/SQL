<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $birthDate = $_POST['birthDate'];
    $card = $_POST['card'];
    $cardNumber = !empty($_POST['cardNumber']) ? $_POST['cardNumber'] : null;
    add($id, $lastName, $firstName, $birthDate, $card, $cardNumber);
}

function add($id, $lastName, $firstName, $birthDate, $card, $cardNumber) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $bdd->prepare('UPDATE clients SET lastName = :lastName, firstName = :firstName, birthDate = :birthDate, card = :card, cardNumber = :cardNumber WHERE id = :id');
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':lastName', $lastName);
        $stmt->bindValue(':firstName', $firstName);
        $stmt->bindValue(':birthDate', $birthDate);
        $stmt->bindValue(':card', $card);
        $stmt->bindValue(':cardNumber', $cardNumber, PDO::PARAM_INT);

    $stmt->execute();

    header("Location: index.php");
    exit();
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
    
}
?>