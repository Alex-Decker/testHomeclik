<?php
require_once ('connexionDB.php');

if(isset($_POST["submit"]) && $_POST["submit"] != "enregistrer"){
    $Non = $_POST["nom"];
    $Prenom = $_POST["prenom"];
    $Adresse = $_POST["adresse"];
    $Telephone = $_POST["telephone"];
    $Date_rendezVous = $_POST["date_rendezVous"];
    $date = new DateTime();
    if ($Date_rendezVous <= $date->format('Y-m-d')){
        echo '<script>alert("la date doit etre strictement supperieur a la date de maintenant")</script>';
    }else {
        $stmt = $dbh->prepare("UPDATE clients SET Nom = '" . $Non . "', Prenom = '" . $Prenom . "', Address = '" . $Adresse . "', Telephone = '" . $Telephone . "', Date_rendezVous = '" . $Date_rendezVous . "' WHERE Id =" . $_POST["submit"]);

        $stmt->execute();
        header('Location: ../Html/nouveauClient.php');

        exit();
    }
}