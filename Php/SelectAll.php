<?php
function SelectAll(){

//require_once ('connexionDB.php');
    $dbh =new PDO('mysql:host=localhost;dbname=testHomelink', 'root', '');
    $stmt = $dbh->prepare("SELECT * FROM clients");

$stmt->execute();

return $rows = $stmt->fetchAll();
}