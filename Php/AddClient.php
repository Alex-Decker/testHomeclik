<?php
//function AddClient(){
    require_once ('connexionDB.php');
    if(isset($_POST["submit"]) && $_POST["submit"] == "enregistrer"){
        $Non = $_POST["nom"];
        $Prenom = $_POST["prenom"];
        $Adresse = $_POST["adresse"];
        $Telephone = $_POST["telephone"];
        $Date_rendezVous = $_POST["date_rendezVous"];
// utilisation des procedure stocker
        $date = new DateTime();
        if ($Date_rendezVous <= $date->format('Y-m-d')){
            echo '<script>alert("la date doit etre strictement supperieur a la date de maintenant")</script>';
        }else{
            $stmt = $dbh->prepare("INSERT INTO clients (Nom, Prenom, Address, Telephone, Date_rendezVous) VALUES (:nom, :prenom, :adresse, :telephone, :date_rendezvous)");

            $stmt->bindParam(':nom', $Non);
            $stmt->bindParam(':prenom', $Prenom);
            $stmt->bindParam(':adresse', $Adresse);
            $stmt->bindParam(':telephone', $Telephone);
            $stmt->bindParam(':date_rendezvous', $Date_rendezVous);


            $stmt->execute();
            echo '<script>alert("Contact enregistrer avec sucess !!!")</script>';

        }

    }