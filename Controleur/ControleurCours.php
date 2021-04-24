<?php

require_once 'Modele/Cours.php';
require_once 'Modele/LangageDeProgrammation.php';
require_once 'Vue/Vue.php';

class ControleurCours
{
    private $cours;
    private $langagesDeProgrammation;

    public function __construct()
    {
        $this->cours = new Cours();
        $this->langagesDeProgrammation = new LangageDeProgrammation();
    }

    public function courses()
    {
        $courses = $this->cours->getCourses();
        $vue = new Vue("Courses");
        $vue->generer(['courses' => $courses]);
    }

    public function cours($idCours, $erreur)
    {
        $cours = $this->cours->getCours($idCours);
        $langageDeProgrammations = $this->langagesDeProgrammation->getProgrammationLanguages($idCours);
        $vue = new Vue("Cours");
        $vue->generer(['cours' => $cours, 'langagesDeProgrammation' => $langageDeProgrammations, 'erreur' => $erreur]);
    }

    public function nouveauCours()
    {
        $vue = new Vue("Ajouter");
        $vue->generer();
    }

    public function ajouter($cours){
        $this->cours->setCours($cours);
        $this->courses();
    }

    public function modifierCours($id)
    {
        $cours = $this->cours->getCours($id);
        $vue = new Vue("ModifierCours");
    }

    public function miseAJourCours($cours)
    {
        $this->cours->updateCours($cours);
        $this->courses();
    }
}
