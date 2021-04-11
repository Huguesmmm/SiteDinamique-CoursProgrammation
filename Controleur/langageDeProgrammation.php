<?php

require 'Modele.php';

try {
    if (isset($_POST['cours_id']))
    {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_POST['cours_id']);
        if ($id != 0)
        {
            $cours = getCours($id);

            $langages_de_programmation = $_POST;

            setProgrammationLanguages($langages_de_programmation);

            header("Location: Controleur/cours.php?id=".$id);

        } else
        {
            throw new Exception("Identifiant de cours incorrect");
        }
    } else
    {
        throw new Exception("Aucun identifiant de cours");
    }
} catch (Exception $e) {
    $msgErreur = $e->getMessage();
    require 'Vue/vueErreur.php';
}