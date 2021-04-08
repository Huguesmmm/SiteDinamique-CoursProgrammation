<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
        <link href='https://fonts.googleapis.com/css?family=Varela' rel='stylesheet'>
    </head>
    <style>
        #ajoutCours 
        {
            font-family: 'Varela';
            font-size: 18px;
        }
    </style>
    <body>
        <h2>Cours de programmation V0.0.1</h2>
        <a id="ajoutCours" href="cours_nouveau.php">Ajouter un cours</a>
        <?php
        // Connexion à la base de données
        try {

            $bdd = new PDO('mysql:host=localhost;dbname=programmation_developpement_v0_0_1;charset=utf8', 'root', 'mysql',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {

            die('Erreur : ' . $e->getMessage());
        }

        // récupération des dix derniers cours
        $reponse = $bdd->query('SELECT * FROM cours ORDER BY id DESC LIMIT 0, 10');

        // Affichage des cours un par un
        while ($donnees = $reponse->fetch()) {
            echo '<p>' . '<a href="cours_modifier.php?id=' .
            $donnees['id'] .
            '"> [modifier] </a> <strong>' .
            htmlspecialchars($donnees['nom']) . '</strong> : <br />';
            echo '<em>' . htmlspecialchars($donnees['description']) . '</em><br />' .
            'Difficulté : ' . htmlspecialchars($donnees['difficulte']) . '</p>';
        }
        
        $reponse->closeCursor();
        ?>
    </body>
</html>

