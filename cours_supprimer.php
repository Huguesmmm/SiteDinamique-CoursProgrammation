<!doctype html>
<html>
    <head>
        <title>Supprimer</title>
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
    </style>
    <body>
        <?php
        // Connexion à la base de données
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=cours_programmation_v0_1_0;charset=utf8;', 'root', 'mysql');
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

        <form action="cours_suppression.php" method="post">
            <h2>Supprimer un cours V0.0.1</h2>

            <table>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Difficulté</th>
                    <th>Privé</th>
                </tr>
                <tr>
                    <td><?php echo htmlspecialchars($donnees['nom']); ?></td>
                    <td><?php echo htmlspecialchars($donnees['description']); ?></td>
                    <td><?php echo htmlspecialchars($donnees['difficulte']); ?></td>
                    <td><?php echo htmlspecialchars($donnees['prive']); ?></td>
                </tr>
            </table>
            <input type="hidden" name="utilisateur_id" value="<?php echo $donnees['utilisateur_id'] ?>" readonly>
            <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />
            <input class="button" type="submit" value="Supprimer" />
            <input class="button" type="button" value="Annuler" name="annuler" onclick="history.back()"/>

            <!--
            <p>
                <label for="nom">Nom</label> : 
                <input type="text" name="nom" id="nom" readonly value="<?php echo htmlspecialchars($donnees['nom']); ?>" /><br />
                <label for="description">Description</label> : 
                <textarea type="text" name="description" id="description"readonly><?php echo htmlspecialchars($donnees['description']); ?></textarea><br />
                <label for="difficulte">Difficulté</label> : 
                <select name="difficulte" id="difficulte" disabled="disabled">
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
                <label for="prive">Privé</label> : 
                <input type="checkbox" name="prive" id="prive" 
            <?php echo ($donnees['prive'] == 1) ? 'checked="checked"' : '' ?> onclick="return false;"/>
                <input type="hidden" name="utilisateur_id" value="<?php echo $donnees['utilisateur_id'] ?>" readonly>
                <input type="hidden" name="id" value="<?php echo $donnees['id']; ?>" />
                <input class="button" type="submit" value="Supprimer" />
                <input class="button" type="button" value="Annuler" name="annuler" onclick="history.back()"/>
            </p>
            -->
            <?php // var_dump($donnees); ?>
        </form>
    </body>
</html>
