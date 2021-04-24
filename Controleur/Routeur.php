<?php

require_once 'Controleur/ControleurCours.php';
require_once 'Controleur/ControleurLangageDeProgrammation.php';
require_once 'Vue/Vue.php';

class Routeur
{
    private $ctrlCours;
    private $ctrlLangageDeProgrammation;

    public function __construct()
    {
        $this->ctrlCours = new ControleurCours();
        $this->ctrlLangageDeProgrammation = new ControleurLangageDeProgrammation();
    }

    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'apropos') {
                    $this->apropos();
                } else if ($_GET['action'] == 'cours') {
                    $idCours = intval($this->getParametre($_GET, 'id'));
                    if ($idCours != 0) {
                        // Vérifier si une erreur est présente
                        $erreur = isset($_GET['erreur']) ? $_GET['erreur'] : '';
                        $this->ctrlCours->cours($id, $erreur);
                    } else
                        throw new Exception("Identifiant de cours non valide");
                } else if ($_GET['action'] == 'langage_de_programmation') {
                    // Tester l'existence des paramètres requis
                    $cours_id = intval($this->getParametre($_POST, 'cours_id'));
                    if ($cours_id != 0) {
                        $this->getParametre($_POST, 'nom');
                        $this->getParametre($_POST, 'description');

                        // Enregistrer le langage_de_programmation
                        $this->ctrlLangageDeProgrammation->langageDeProgrammation($_POST);
                    } else
                        throw new Exception("Identifiant de cours incorrect");
                } else if ($_GET['action'] == 'confirmer') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlLangageDeProgrammation->confirmer($id);
                    } else
                        throw new Exception("Identifiant de langage de programmation incorrect");
                } else if ($_GET['action'] == 'supprimer') {
                    $id = intval($this->getParametre($_POST, 'id'));
                    if ($id != 0) {
                        $this->ctrlLangageDeProgrammation->supprimer($id);
                    } else
                        throw new Exception(" Identifiant de langage de programmation incorrect");
                } else if ($_GET['action'] == 'nouveauCours') {
                    $this->ctrlCours->nouveauCours();
                } else if ($_GET['action'] == 'ajouter') {
                    // Tester l'existence des paramètres requis
                    $utilisateur_id = intval($this->getParametre($_POST, 'utilisateur_id'));
                    if ($utilisateur_id != 0) {
                        $this->getParametre($_POST, 'nom');
                        $this->getParametre($_POST, 'description');
                        $this->getParametre($_POST, 'duree');
                        $this->getParametre($_POST, 'difficulte');
                        $this->getParametre($_POST, 'prive');
                        // Enregistrer le cours
                        $this->ctrlCours->ajouter($_POST);
                    } else
                        throw new Exception("Identifiant d'utilisateur non valide");
                } else if ($_GET['action'] == 'miseAJourCours') {
                    $id = intval($this->getParametre($_POST, 'id'));
                    if ($id != 0) {
                        $utilisateur_id = intval($this->getParametre($_POST, 'utilisateur_id'));
                        if ($utilisateur_id != 0) {
                            // Vérifier l'existence des paramètres
                            $this->getParametre($_POST, 'nom');
                            $this->getParametre($_POST, 'description');
                            $this->getParametre($_POST, 'duree');
                            $this->getParametre($_POST, 'difficulte');
                            $this->getParametre($_POST, 'prive');
                            // Enregistrer le cours
                            $this->ctrlCours->miseAJourCours($_POST);
                        } else
                            throw new Exception("Identifiant d'utilisateur non valide");
                    } else
                        throw new Exception("Identifiant de cours non valide");
                } else if ($_GET['action'] == 'modifierCours') {
                    $id = intval($this->getParametre($_GET, 'id'));
                    if ($id != 0) {
                        $this->ctrlCours->modifierCours($id);
                    } else
                        throw new Exception("Identifiant de cours non valide");
                } else
                    throw new Exception("Action non valide");
            } else { // aucune action définie : affichage de l'accueil
                accueil();
            }
        } catch (Exception $e) {
            erreur($e->getMessage());
        }
    }

    private function apropos()
    {
        $vue = new Vue("Apropos");
    }

    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else {
            throw new Exception("Paramètre '$nom' absent");
        }
    }
}