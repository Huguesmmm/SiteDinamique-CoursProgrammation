<?php

require_once 'Modele/Cours.php';
require_once 'Modele/LangageDeProgrammations.php';
require_once 'Vue/Vue.php';

class ControleurCours
{
    private $cours;
    private $langage_de_programmations;

    public function __construct()
    {
        $this->cours = new Cours();
        $this->langage_de_programmations = new LangageDeProgrammations();
    }

    public function courses()
    {
        $courses = $this->cours->get_courses();
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
