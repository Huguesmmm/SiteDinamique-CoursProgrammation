<?php

require_once 'Modele/Cours.php';
require_once 'Modele/LangageDeProgrammation.php';
require_once 'Vue/Vue.php';

class ControleurCours
{
    private $cours;
    private $langage_de_programmations;

    public function __construct()
    {
        $this->cours = new Cours();
        $this->langage_de_programmations = new LangageDeProgrammation();
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
        $langage_deProgrammations = $this->langage_de_programmations->getProgrammationLanguages($idCours);
        $vue = new Vue("Cours");
        $vue->generer(['cours' => $cours, 'langage_deProgrammations' => $langage_deProgrammations, 'erreur' => $erreur]);
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
