<?php

require_once 'Modele/Modele.php';

class Cours extends Modele
{
    function getCourses()
    {
        $bdd = getBdd();
        $courses = $bdd->query('select id as id, nom as name,'
            . ' description as description, duree as duration,'
            . ' utilisateur_id as user_id, '
            . ' difficulte as difficulty, prive as private from cours'
            . ' order by id desc');
        return $courses;
    }

    // Renvoie les informations sur un billet
    function getCours($idCours)
    {
        $bdd = getBdd();
        $cours = $bdd->prepare('select id as id, nom as name,'
            . ' description as description, duree as duration,'
            . ' utilisateur_id as user_id,'
            . ' difficulte as difficulty, prive as private from cours'
            . ' where id=?');
        $cours->execute(array($idCours));
        if ($cours->rowCount() == 1) {
            return $cours->fetch();
        }  // Accès à la première ligne de résultat
        else {
            throw new Exception("Aucun cours ne correspond à l'identifiant '$idCours'");
        }
    }

    // Ajouter un cours
    function setCours($cours)
    {
        $bdd = getBdd();

        $prive = (isset($cours['prive'])) ? 1 : 0;
        $req = $bdd->prepare('INSERT INTO cours (nom, ' .
            'description, ' .
            'utilisateur_id, ' .
            'difficulte,' .
            'prive)' .
            ' VALUES(?,?,?,?,?)'
        );
        $req->execute([$cours['nom'],
                $cours['description'],
                $cours['utilisateur_id'],
                $cours['difficulte'],
                $prive]
        );
    }
}

