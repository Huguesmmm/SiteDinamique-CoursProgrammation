<?php

require 'Modele/Modele.php';

try {
    if (isset($_GET['id']))
    {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET['id']);
        if ($id != 0)
        {
            $cours = getCours($id);
            $langages_de_programmation = getProgrammationLanguages($id);
            require 'Vue/vueCours.php';
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