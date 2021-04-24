<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurLangageDeProgrammation {

    private $langagesDeProgrammation;

    public function __construct() {
        $this->langagesDeProgrammation = new LangageDeProgrammation();
    }

    public function langageDeProgrammation($langageDeProgrammation){
       $this->langagesDeProgrammation->setProgrammationLanguage($langageDeProgrammation);
        header('Location: index.php?action=cours&id=' . $langageDeProgrammation['cours_id']);
    }

    public function confirmer($id){
        //Lire le langageDeProgrammation à l'aide du modèle
        $langageDeProgrammation = $this->langagesDeProgrammation->getProgrammationLanguage($id);
        $vue = new Vue("Confirmer");
        $vue->generer(array('langageDeProgrammation' => $langageDeProgrammation));
    }

    public function supprimer($id){
        // Lilre le langageDeProgrammation afin d'obtenir le id du cours assigné
        $langageDeProgrammation = $this->langagesDeProgrammation->getProgrammationLanguage($id);
        $_SESSION['h2024a4message'] = "Supprimer un langage de programmation n'est pas permis en démonstration";
        $this->langagesDeProgrammation->deleteProgrammationLanguage($id);
        //Recharger la page pour mettre à jour la liste des langages de programmation
        header('Location: index.php?action=article&id=' . $langageDeProgrammation['cours_id']);
    }

}