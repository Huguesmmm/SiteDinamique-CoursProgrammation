<?php
// connexion à la base de données
try {

    $bdd = new PDO('mysql:host=localhost;dbname=cours_programmation_v0_1_0;charset=utf8', 'root', 'mysql',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (Exception $e) {

    die('Erreur : ' . $e->getMessage());
}

// Insertion du cours à l'aide d'une requête séparée
$req = $bdd->prepare('DELETE FROM cours WHERE id = ?');
$req->execute(array(filter_input(INPUT_POST, 'id')));

// Redirection du visiteur vers la page d'acceuil
// Mettre en commentaire pour déboguer
// header('Location: index.php');
?>
<html>
    <body>
        <h2>Suppression V0.0.1</h2>
        <form action="index.php">
            *** Pour débogage ***<br />
            Voici le contenu de $_POST envoyé par le formulaire de modification et transmis à la requête : <br /> 
            <?php var_dump(filter_input_array(INPUT_POST)); ?>
            <input type="submit" value="Continuer">
        </form>
    </body>
</html>

