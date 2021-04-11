<?php
//require 'langagesDeProgrammation.php';
// 'Controleur/courses.php';

require 'Controleur/Controleur.php';

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'cours') {
            if (isset($_GET['id'])) {
                $idCours = intval($_GET['id']);
                if ($idCours != 0) {
                    cours($idCours);
                } else
                    throw new Exception("Identifiant de billet non valide");
            } else
                throw new Exception("Identifiant de billet non défini");
        } else
            throw new Exception("Action non valide");
    } else { // aucune action définie : affichage de l'accueil
        accueil();
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}



