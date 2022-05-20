<?php
$user = "root";
$pass = "";
try {
    $dbh = new PDO('mysql:host=localhost;dbname=testHomelink', $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}