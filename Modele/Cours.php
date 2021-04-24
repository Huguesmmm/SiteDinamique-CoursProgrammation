<?php

require_once 'Modele/Modele.php';

class Cours extends Modele
{
    function getCourses()
    {
        $sql = 'select id as id, nom as name,'
            . ' description as description, duree as duration,'
            . ' utilisateur_id as user_id, '
            . ' difficulte as difficulty, prive as private from cours'
            . ' order by id desc';
        $courses = $this->executerRequete($sql);
        return $courses;
    }

    // Renvoie les informations sur un billet
    function getCours($idCours)
    {
        $sql = 'select id as id, nom as name,'
            . ' description as description, duree as duration,'
            . ' utilisateur_id as user_id,'
            . ' difficulte as difficulty, prive as private from cours'
            . ' where id=?';
        $cours = $this->executerRequete($sql, array($idCours));
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
        $prive = (isset($cours['prive'])) ? 1 : 0;
        $sql = 'INSERT INTO cours (nom, ' .
            'description, ' .
            'utilisateur_id, ' .
            'difficulte,' .
            'prive)' .
            ' VALUES(?,?,?,?,?)';

        $this->executerRequete($sql, array([$cours['nom'],
            $cours['description'],
            $cours['utilisateur_id'],
            $cours['difficulte'],
            $prive]));
    }

    function updateCours($cours)
    {
        $prive = (isset($cours['prive'])) ? 1 : 0;
        $sql = 'UPDATE cours SET '
            . 'nom = ?, '
            . 'description = ?,'
            . 'duree = ?,'
            . 'utilisateur_id = ?,'
            . 'difficulte = ?,'
            . 'prive = ?'
            . 'WHERE id = ?';
        $this->executerRequete($sql, array([$cours['nom'],
            $cours['description'],
            $cours['utilisateur_id'],
            $cours['difficulte'],
            $prive]));
        return $cours;
    }
}

