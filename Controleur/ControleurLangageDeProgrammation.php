<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurLangageDeProgrammation {

    private $langage_de_programmations;

    public function __construct() {
        $this->langage_de_programmations = new LangageDeProgrammations();
    }

    public function langageDeProgrammation($langage_de_programmation){
        //TODO : validation courriel
    }

    public function confirmer($id){
        //Lire le langage_de_programmation à l'aide du modèle
        $langage_de_programmation = $this->langage_de_programmations->getProgrammationLanguage($id);
        $vue = new Vue("Confirmer");
        $vue->generer(array('langage_de_programmation' => $langage_de_programmation));
    }

    public function supprimer($id){
        // Lilre le langage_de_programmation afin d'obtenir le id du cours assigné
        $langage_de_programmation = $this->langage_de_programmations->getProgrammationLanguage($id);
        $_SESSION['h2024a4message'] = "Supprimer un langage de programmation n'est pas permis en démonstration";
        $this->langage_de_programmations->deleteProgrammationLanguage($id);
        //Recharger la page pour mettre à jour la liste des langages de programmation
        header('Location: index.php?action=article&id=' . $langage_de_programmation['cours_id']);
    }

}