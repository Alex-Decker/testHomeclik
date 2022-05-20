<?php

require_once('connexionDB.php');
if (isset($_GET["id"])) {
    var_dump($_GET["id"]);
    $stmt = $dbh->prepare("DELETE FROM clients WHERE Id= ".$_GET["id"]);
    $stmt->execute();
    header('Location: ../index.php');

    exit();

}else{
    echo "<script>confirm('aucun client n\'existe pour etre supprimer)</script>";
}