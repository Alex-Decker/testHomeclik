<?php
require_once ('./Php/SelectAll.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List clents</title>
</head>
<body>
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
                echo "<tr>
                        <td><a href='Html/nouveauClient.php?id=".$ligne['Id']."'>".$ligne['Id']."</a></td>
                        <td>".$ligne['Nom']."</td>
                        <td>".$ligne['Prenom']."</td>
                        <td>".$ligne['Address']."</td>
                        <td>".$ligne['Telephone']."</td>
                        <td>".$ligne['Date_rendezVous']."</td>
                        <td>".$ligne['DateCréation']."</td>
                    </tr>";
            }
        ?>
    </table>
    <button type="submit" ><a href="Html/nouveauClient.php">Creer un nouveau client</a></button>
</body>
</html>