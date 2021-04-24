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

}