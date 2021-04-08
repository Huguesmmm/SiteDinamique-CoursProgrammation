<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link href='https://fonts.googleapis.com/css?family=Varela' rel='stylesheet'>
    </head>
    <style>
        table {
            font-family: arial, sans-serif;
            border: none;
            border-collapse: collapse;
            width: 100%;
        }
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(odd) {
            background-color: #dddddd;
        }
        tr:first-child{
            background-color: #343049;
            color: white;
        }
        body > h2:first-child{
            text-align: center;
            padding: 20px;
            background-color: #036E7B;
            color: white;
        }
        #ajoutCours, #aPropos
        {
            padding: 5px;
            font-family: 'Varela';
            font-size: 18px;
        }
    </style>
    <body>
        <h2>Cours de programmation V0.1.0</h2>
        <p>
            <a id="ajoutCours" href="cours_nouveau.php">Ajouter un cours</a>
            <a id="aPropos" href="cours_a_propos.php">À propos</a>
        </p>
        <?php
        // Connexion à la base de données
        try {

            $bdd = new PDO('mysql:host=localhost;dbname=cours_programmation_v0_1_0;charset=utf8', 'root', 'mysql',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());
        }

        // récupération des dix derniers cours
        $reponse = $bdd->query('SELECT * FROM cours ORDER BY id DESC LIMIT 0, 10');
        ?>

        <table>
            <tr>
                <td>Suppression</td>
                <td>Modification</td>
                <td>Nom</td>
                <td>Description</td>
                <td>Difficulté</td>
                <td>Privé</td>
            </tr>
            <?php
            // Affichage des cours un par un
            while ($donnees = $reponse->fetch())
            {
                echo '<tr>';
                echo '<td>'
                . '<a href="cours_supprimer.php?id='
                . $donnees['id'] . '"> [supprimer] </a>'
                . '</td>'
                . '<td>'
                . '<a href="cours_modifier.php?id='
                . $donnees['id'] . '"> [modifier] </a>'
                . '</td>'
                . '<td>'
                . htmlspecialchars($donnees['nom'])
                . '</td>'
                . '<td>'
                . htmlspecialchars($donnees['description'])
                . '</td>'
                . '<td>'
                . htmlspecialchars($donnees['difficulte'])
                . '</td>'
                . '<td>'
                . (($donnees['prive'] == 1) ? 'oui' : 'non')
                . '</td>';
                echo '</tr>';
            }
            $reponse->closeCursor();
            ?>
        </table>
    </body>
</html>



