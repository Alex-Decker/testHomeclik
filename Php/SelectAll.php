<?php
function SelectAll(){

require_once ('connexionDB.php');
$stmt = $dbh->prepare("SELECT * FROM clients");

$stmt->execute();

return $rows = $stmt->fetchAll();
}