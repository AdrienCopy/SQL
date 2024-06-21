<?php
require_once '../function/function.php';
checkLoggedIn();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <a href="create.php"> Add </a>
    <br><br>
    <table>
      <?php include 'readI.php'?>
    </table>
  </body>
</html>
