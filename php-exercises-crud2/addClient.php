<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['lastName']) 
    && isset($_POST['firstName']) 
    && isset($_POST['birthDate']) 
    && isset($_POST['card']) 
    && isset($_POST['cardNumber'])) {

    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $birthDate = $_POST['birthDate'];
    $card = $_POST['card'];
    $cardNumber = !empty($_POST['cardNumber']) ? $_POST['cardNumber'] : null;
    add($lastName, $firstName, $birthDate, $card, $cardNumber);
    }
}    

function add($lastName, $firstName, $birthDate, $card, $cardNumber) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        $stmt = $bdd->prepare('INSERT INTO clients (lastName, firstName, birthDate, card, cardNumber) VALUES (:lastName, :firstName, :birthDate, :card, :cardNumber)');
        $stmt->bindValue(':lastName', $lastName);
        $stmt->bindValue(':firstName', $firstName);
        $stmt->bindValue(':birthDate', $birthDate);
        $stmt->bindValue(':card', $card);
        $stmt->bindValue(':cardNumber', $cardNumber, PDO::PARAM_INT);

    $stmt->execute();
    header("Location: index.php");

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
    
}