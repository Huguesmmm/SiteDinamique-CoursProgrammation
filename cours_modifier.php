<!doctype html>
<html>
    <head>
        <title>Modifier</title>
    </head>
    <style>
        body{
            text-align: center;
        }
        .button{
            background-color: #008CBA;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
    <body>
        <?php
        // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=programmation_developpement_v0_0_1;charset=utf8;', 'root', 'mysql');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        // Récupération du commentaire à modifier
        try {
            $req = $bdd->prepare('SELECT * FROM cours WHERE id = ' . $_GET['id']);
            $req->execute(array($_GET['id']));
        } catch (Exception $ex) {
            die('Erreur : ' . $e->getMessage());
        }
        
        // Affichage du cours à modifier
        $donnees = $req->fetch();
        $req->closeCursor();
        ?>
        
        <form action="cours_mis_a_jour.php" method="post">
            <h2>Modifier un cours V0.0.1</h2>
            <p>
                <label for="nom">Nom</label> : 
                <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($donnees['nom']); ?>" /><br />
                <label for="description">Description</label> : 
                <textarea type="text" name="description" id="description" ><?php echo htmlspecialchars($donnees['description']); ?></textarea><br />
                <label for="difficulte">Difficulté</label> : 
                <select name="difficulte" id="difficulte">
                    <option value="facile"
                            <?php
                            echo ($donnees['difficulte'] == 'facile') ?
                                'selected="selected"' : ''
                            ?>
                            >facile</option>
                    <option value="moyenne"
                            <?php
                            echo ($donnees['difficulte'] == 'moyenne') ?
                                'selected="selected"' : ''
                            ?>
                            >moyenne</option>
                    <option value="difficile"
                            <?php
                            echo ($donnees['difficulte'] == 'difficile') ?
                                'selected="selected"' : ''
                            ?>
                            >difficile</option>
                </select>
                <input type="hidden" name="utilisateur_id" value="<?php echo $donnees['utilisateur_id'] ?>">
                <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />
                <input class="button" type="submit" value="Modifier" />
            </p>
            // <?php var_dump($donnees); ?>
        </form>
    </body>
</html>


