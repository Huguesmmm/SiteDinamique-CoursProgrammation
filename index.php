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
                    throw new Exception("Identifiant de cours non valide");
            } else
                throw new Exception("Identifiant de cours non défini");
        } else if ($_GET['action'] == 'langage_de_programmation') {
            if (isset($_POST['cours_id'])) {
                $id = intval($_POST['cours_id']);
                if ($id != 0) {
                    // vérifier si le cours existe
                    $cours = getCours($id);
                    // Récupérer les données du formulaire
                    $langage_de_programmation = $_POST;
                    // Ajuster la valeur de la case à cocher
                    $langage_de_programmation['prive'] = (isset($_POST['prive'])) ? 1 : 0;
                    // Réaliser l'action langage_de_programmation du contrôleur
                    langage_de_programmation($langage_de_programmation);
                } else
                    throw new Exception("Identifiant de cours incorrect");
            } else
                throw new Exception("Aucun identifiant de cours");
        } else if ($_GET['action'] == 'confirmer') {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                if ($id != 0) {
                    confirmer($id);
                } else
                    throw new Exception("Identifiant de langage de programmation incorrect");
            } else
                throw new Exception("Aucun identifiant de langage de programmation");
        } else if ($_GET['action'] == 'supprimer') {
            if (isset($_POST['id'])) {
                $id = intval($_POST['id']);
                if ($id != 0) {
                    supprimer($id);
                } else
                    throw new Exception(" Identifiant de langage de programmation incorrect");
            } else
                throw new Exception("Aucun identifiant de langage de programmation");
        } else if ($_GET['action'] == 'modifier') {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                if ($id != 0) {
                    modifier($id);
                } else
                    throw new Exception(" Identifiant de langage de programmation incorrect");
            } else
                throw new Exception("Aucun identifiant de langage de programmation");
        } else if ($_GET['action'] == 'nouveauCours') {
            nouveauCours();
        } else if ($_GET['action'] == 'ajouter') {
            $cours = $_POST;
            ajouter($cours);
        } else if ($_GET['action'] == 'mettre_a_jour') {
            if (isset($_POST['id'])) {
                $id = intval($_POST['id']);
                if ($id != 0) {
                    mettreAJour($id);
                } else
                    throw new Exception(" Identifiant de langage de programmation incorrect");
            } else
                throw new Exception("Aucun identifiant de langage de programmation");
        } else if ($_GET['action'] == 'quelsLangages') {
            quelsLangages($_GET['term']);
        } else
            throw new Exception("Action non valide");
    } else { // aucune action définie : affichage de l'accueil
        accueil();
    }
} catch (Exception $e) {
    erreur($e->getMessage());
}



