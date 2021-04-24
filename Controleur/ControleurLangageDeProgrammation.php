<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurLangageDeProgrammation {

    private $langagesDeProgrammation;

    public function __construct() {
        $this->langagesDeProgrammation = new LangageDeProgrammation();
    }

    public function langageDeProgrammation($langage_de_programmation){
       $this->langagesDeProgrammation->setProgrammationLanguage($langage_de_programmation);
        header('Location: index.php?action=cours&id=' . $commentaire['cours_id']);
    }

    public function confirmer($id){
        //Lire le langage_de_programmation à l'aide du modèle
        $langage_de_programmation = $this->langagesDeProgrammation->getProgrammationLanguage($id);
        $vue = new Vue("Confirmer");
        $vue->generer(array('langage_de_programmation' => $langage_de_programmation));
    }

    public function supprimer($id){
        // Lilre le langage_de_programmation afin d'obtenir le id du cours assigné
        $langage_de_programmation = $this->langagesDeProgrammation->getProgrammationLanguage($id);
        $_SESSION['h2024a4message'] = "Supprimer un langage de programmation n'est pas permis en démonstration";
        $this->langagesDeProgrammation->deleteProgrammationLanguage($id);
        //Recharger la page pour mettre à jour la liste des langages de programmation
        header('Location: index.php?action=article&id=' . $langage_de_programmation['cours_id']);
    }

}