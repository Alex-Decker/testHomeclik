<?php
require_once ('Php/SelectAll.php');
require_once ('Php/AddClient.php');
require_once ('Php/UpdateClient.php');
if (isset($_GET["id"])) {
    $dbh =new PDO('mysql:host=localhost;dbname=testHomelink', 'root', '');
    $stmt = $dbh->prepare("SELECT * FROM clients WHERE Id=".$_GET["id"]);
    $stmt->execute();
    $iteme = $stmt->fetch();
    $date = new DateTime();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/index.css">
    <link rel="stylesheet" href="Css/index2.css">
    <title>List clents</title>
</head>
<body>
<div class="main">
    <div>
        <h1 class="main_titre">Liste des clients</h1>
    </div>
    <div class="main_content">
        <div class="tab_content">
            <table>
                <thead>
                <th>Id</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Adresse</th>
                <th>Telephone</th>
                <th>Date rendez-vous</th>
                <th>Date de creation</th>
                </thead>
                <?php
                foreach (SelectAll() as $ligne){
                    echo "<tr class='modal-tr' onclick=\"location.href='index2.php?id=".$ligne['Id']."'\">
                        <td>".$ligne['Id']."</td>
                        <td>".$ligne['Nom']."</td>
                        <td>".$ligne['Prenom']."</td>
                        <td>".$ligne['Address']."</td>
                        <td>".$ligne['Telephone']."</td>
                        <td>".$ligne['Date_rendezVous']."</td>
                        <td>".$ligne['DateCréation']."</td>
                    </a></tr>";
                }
                ?>
            </table>
        </div>
        <div class="btn_validation">
            <button type="submit" class="modal-btn" ><a >Creer un nouveau client</a></button>
        </div>

    </div>
</div>
<div class="modal-bg <?php if (isset($_GET['id'])) { echo 'bg-active';}?>">
    <div class="modal">
        <div class="main-modal">
            <h1 class="main_titre-modal"><?php if (isset($_GET["id"])) { echo 'Modification du client : '.$iteme['Id'];}else{echo 'Creation de nouveau client';}?></h1>

            <form action="index2.php" method="POST">
                <div class="line-modal">
                    <label for="Nom">Nom</label>
                    <input type="text" name="nom" id="nom" <?php if (isset($_GET["id"])) { echo 'value="'.$iteme['Nom'].'"';}?> required>
                </div>
                <div class="line-modal">
                    <label for="Prenom">Prenom</label>
                    <input type="text" name="prenom" id="prenom" <?php if (isset($_GET["id"])) { echo 'value="'.$iteme['Prenom'].'"';}?> required>
                </div>
                <div class="line-modal">
                    <label for="Adresse">Adresse</label>
                    <textarea name="adresse" id="adresse" rows="4" required><?php if (isset($_GET["id"])) { echo $iteme['Address'];}?></textarea>
                </div>
                <div class="line-modal">
                    <label for="Telphone">Telphone</label>
                    <input type="number" name="telephone"  id="telephone" <?php if (isset($_GET["id"])) { echo 'value="'.$iteme['Telephone'].'"';}?> required>
                </div >
                <div class="line-modal">
                    <label for="Date_rendezVous">Date rendez-Vous</label>
                    <input type="date" name="date_rendezVous" id="date_rendezVous" <?php if (isset($_GET["id"])) { echo 'value="'.$iteme['Date_rendezVous'].'"';}?>>
                </div>
                <div class="btn_validation-modal">
                    <button class="annuler-modal" type="button"><a >Annuler</a></button>
                    <button class="enregistrer-modal" type="submit" name="submit" <?php if (isset($_GET["id"])) { echo 'value="'.$_GET["id"].'"';}else{echo 'value="enregistrer"';}?>><?php if (isset($_GET["id"])) { echo 'Modifier';}else{echo 'Enregistrer';}?></button>
                    <button class="supprimer-modal" <?php if (isset($_GET["id"])) {echo 'type="button"';} else {echo 'type="reset"';}?>><a <?php
                        if (isset($_GET["id"])) {
                            $l=$_GET["id"];
                            echo "onclick=\"return confirm('voulez-vous vraiment supprimer ce client ???')\"";
                            echo "href='Php/DeleteClient.php?id=".$_GET["id"]."'";
                        }
                        ?> ><?php if (isset($_GET["id"])) {echo 'Supprimer';} else {echo 'refrech';}?></a></button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="Js/index2.js"></script></body>
</html>