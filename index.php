<?php
require_once('./Php/SelectAll.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Css/index.css">
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
                        echo "<tr onclick=\"location.href='Html/nouveauClient.php?id=".$ligne['Id']."'\">
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
                <button type="submit" ><a href="Html/nouveauClient.php">Creer un nouveau client</a></button>
            </div>

        </div>
    </div>
</body>
</html>