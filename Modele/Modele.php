<?php

function getBdd()
{
    $bdd = new PDO('mysql:host=localhost;dbname=cours_programmation_v0_1_0_1;charset=utf8',
        'root', 'mysql');
    return $bdd;
}

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

// Renvoie la liste des langages de programmation associés à un cours
function getProgrammationLanguages($idCours = null)
{
    $bdd = getBdd();
    if ($idCours == null) {
        $langages_de_programmation = $bdd->query('select * from langage_de_programmation');
    } else {
        $langages_de_programmation = $bdd->prepare('select * from langage_de_programmation'
            . ' where cours_id = ?');
        $langages_de_programmation->execute(array($idCours));
    }
    return $langages_de_programmation;
}

// Renvoie un langage de programmation specifique
function getProgrammationLanguage($id)
{
    $bdd = getBdd();
    $langages_de_programmation = $bdd->prepare('select * from langage_de_programmation where id = ?');
    $langages_de_programmation->execute(array($id));
    if ($langages_de_programmation->rowCount() == 1) {
        return $langages_de_programmation->fetch();
    }else {
        throw new Exception("Aucun langage de programmation ne correspond à l'identifiant '$id'");
    }
    return $langages_de_programmation;
}

// Met à jour un langage de programmation
function updateProgrammationLanguage($langage_de_programmation)
{
    $bdd = getBdd();
    $langages_de_programmation = $bdd->prepare('UPDATE langage_de_programmation SET '
        . 'nom = ?, '
        . 'description = ?');
    $langages_de_programmation->execute(array($langage_de_programmation['nom'],
        $langage_de_programmation['description']));
    return $langages_de_programmation;
}

// Ajouter un langage de programmation
function setProgrammationLanguages($langage_de_programmation)
{
    $bdd = getBdd();
    $langages_de_programmation = $bdd->prepare('INSERT INTO langage_de_programmation (nom, description, cours_id) VALUES (?,?,?)');
    $langages_de_programmation->execute(array($langage_de_programmation['nom'], $langage_de_programmation['description'],
        $langage_de_programmation['cours_id']));
    return $langages_de_programmation;
}

// Supprime un langage de programmation
function deleteProgrammationLanguage($id){
    $bdd = getBdd();
    $result = $bdd->prepare('DELETE FROM langage_de_programmation WHERE id = ?');
    $result->execute(array($id));
    return $result;
}
