<?php
require_once ('../Php/AddClient.php');
require_once ('../Php/UpdateClient.php');
if (isset($_GET["id"])) {
    $stmt = $dbh->prepare("SELECT * FROM clients WHERE Id=".$_GET["id"]);
    $stmt->execute();
    $ligne = $stmt->fetch();
    $date = new DateTime();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/nouveauClient.css">
    <title>List clents</title>
</head>
<body>
<div class="main">
    <h1 class="main_titre"><?php if (isset($_GET["id"])) { echo 'Modification du client : '.$ligne['Id'];}else{echo 'Creation de nouveau client';}?></h1>

    <form action="nouveauClient.php" method="POST">
        <div class="line">
            <label for="Nom">Nom</label>
            <input type="text" name="nom" id="nom" <?php if (isset($_GET["id"])) { echo 'value="'.$ligne['Nom'].'"';}?> required>
        </div>
        <div class="line">
            <label for="Prenom">Prenom</label>
            <input type="text" name="prenom" id="prenom" <?php if (isset($_GET["id"])) { echo 'value="'.$ligne['Prenom'].'"';}?> required>
        </div>
        <div class="line">
            <label for="Adresse">Adresse</label>
            <textarea name="adresse" id="adresse" rows="4" required><?php if (isset($_GET["id"])) { echo $ligne['Address'];}?></textarea>
        </div>
        <div class="line">
            <label for="Telphone">Telphone</label>
            <input type="number" name="telephone"  id="telephone" <?php if (isset($_GET["id"])) { echo 'value="'.$ligne['Telephone'].'"';}?> required>
        </div >
        <div class="line">
            <label for="Date_rendezVous">Date rendez-Vous</label>
            <input type="date" name="date_rendezVous" id="date_rendezVous" <?php if (isset($_GET["id"])) { echo 'value="'.$ligne['Date_rendezVous'].'"';}?>>
        </div>
        <div class="btn_validation">
            <button class="annuler" type="button"><a href="../index.php">Annuler</a></button>
            <button class="enregistrer" type="submit" name="submit" <?php if (isset($_GET["id"])) { echo 'value="'.$_GET["id"].'"';}else{echo 'value="enregistrer"';}?>><?php if (isset($_GET["id"])) { echo 'Modifier';}else{echo 'Enregistrer';}?></button>
            <button class="supprimer" <?php if (isset($_GET["id"])) {echo 'type="button"';} else {echo 'type="reset"';}?>><a <?php
                if (isset($_GET["id"])) {
                    $l=$_GET["id"];
                    echo "onclick=\"return confirm('voulez-vous vraiment supprimer ce client ???')\"";
                    echo "href='../Php/DeleteClient.php?id=".$_GET["id"]."'";
                }
                ?> ><?php if (isset($_GET["id"])) {echo 'Supprimer';} else {echo 'refrech';}?></a></button>
        </div>
    </form>
</div>
</body>
</html>