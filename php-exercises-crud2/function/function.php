<?php
function showTypes($selectedId = null) {
        $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = 'SELECT * FROM showTypes';
        $stmt = $bdd->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $selected = $row['id'] == $selectedId ? 'selected' : '';
            echo "<option value='" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' $selected>" . htmlspecialchars($row['type'], ENT_QUOTES, 'UTF-8') . "</option>";
        }
}

function showGenres($selectedId = null) {
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT * FROM genres';
        $result = $bdd->prepare($query);
        $result->execute();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($row['id'] == $selectedId) ? 'selected' : '';
            echo "<option value='" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "' $selected>" . htmlspecialchars($row['genre'], ENT_QUOTES, 'UTF-8') . "</option>";
          }
}

function selectClient() {
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT * 
        FROM clients
        ORDER BY lastName ASC';
        $result = $bdd->prepare($query);
        $result->execute();
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['id'] . "'>" . $row['firstName'] . " " . $row['lastName'] . "</option>";
          }
}

function selectShow() {
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = 'SELECT * 
        FROM shows
        ORDER BY performer ASC';
        $result = $bdd->prepare($query);
        $result->execute();
        
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='" . $row['id'] . "'>" . $row['performer'] . " : " . $row['title'] . "</option>";
          }
}

function getClientById($id) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = 'SELECT * FROM clients WHERE id = :id';
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        return false;
    }
}

function getShowById($id) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = 'SELECT * FROM shows WHERE id = :id';
        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Erreur : ' . $e->getMessage();
        return false;
    }
}

function affiche($id) {
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = '
        SELECT COUNT(bookings.id) AS booking_count,
            bookings.id AS booking_id, 
            clients.id AS client_id, 
            clients.lastName AS client_lastName,
            SUM(price) AS total_price
        FROM bookings
        INNER JOIN tickets ON bookings.id = tickets.bookingsId
        INNER JOIN clients ON clients.id = bookings.clientId
        WHERE clients.id = :id
        GROUP BY booking_id, client_id, client_lastName 
    ';
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "<table width='100%' border='1'>";
    echo "<tr><th>ID</th><th>clientId</th><th>price</th><th>Nombre de commande</th><th>last name</th></tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['booking_id'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['client_id'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['total_price'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['booking_count'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['client_lastName'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "</tr>";
        //echo "<tr><td colspan='6'><pre>";
        //print_r($row);
        //echo "</pre></td></tr>";
    }
    
    echo "</table>";
    $bdd = null;
}

function afficheCommande($id) {
    $bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $query = '
        SELECT bookings.id AS booking_id, 
            clients.id AS client_id, 
            clients.lastName AS client_lastName,
            price AS total_price
        FROM bookings
        INNER JOIN tickets ON bookings.id = tickets.bookingsId
        INNER JOIN clients ON clients.id = bookings.clientId
        WHERE clients.id = :id
        
    ';
    $stmt = $bdd->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    echo "<table width='100%' border='1'>";
    echo "<tr><th>ID</th><th>clientId</th><th>price</th><th>booking ID</th><th>last name</th></tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['booking_id'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['client_id'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['total_price'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['booking_id'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>" . htmlspecialchars($row['client_lastName'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "</tr>";
        //echo "<tr><td colspan='6'><pre>";
        //print_r($row);
        //echo "</pre></td></tr>";
    }
    
    echo "</table>";
    $bdd = null;
}



?>
