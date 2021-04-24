<?php

class LangageDeProgrammations extends Modele
{
    // Renvoie la liste des langages de programmation associés à un cours
    function getProgrammationLanguages($idCours)
    {
        $sql = 'select * from langage_de_programmation'
            . ' where cours_id = ?';
        $langages_de_programmation = $this->executerRequete($sql);

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
        } else {
            throw new Exception("Aucun langage de programmation ne correspond à l'identifiant '$id'");
        }
    }

    // Met à jour un langage de programmation
    function updateProgrammationLanguage($langage_de_programmation)
    {
        $bdd = getBdd();
        $langages_de_programmation = $bdd->prepare('UPDATE langage_de_programmation SET '
            . 'nom = ?, '
            . 'description = ?,'
            . 'courriel = ?,'
            . 'url = ? WHERE id = ?');
        $langages_de_programmation->execute(array($langage_de_programmation['nom'],
            $langage_de_programmation['description'], $langage_de_programmation['courriel'],
            $langage_de_programmation['url'],
            $langage_de_programmation['id']));
        return $langages_de_programmation;
    }

    // Ajouter un langage de programmation
    function setProgrammationLanguage($langage_de_programmation)
    {
        $bdd = getBdd();
        $langages_de_programmation = $bdd->prepare('INSERT INTO langage_de_programmation (nom, description, cours_id) VALUES (?,?,?)');
        $langages_de_programmation->execute(array($langage_de_programmation['nom'], $langage_de_programmation['description'],
            $langage_de_programmation['cours_id']));
        return $langages_de_programmation;
    }

    // Supprime un langage de programmation
    function deleteProgrammationLanguage($id)
    {
        $bdd = getBdd();
        $result = $bdd->prepare('DELETE FROM langage_de_programmation WHERE id = ?');
        $result->execute(array($id));
        return $result;
    }

    // Recherche les langages répondant à l'autocomplete
    function searchMatchLanguage($term)
    {
        $bdd = getBdd();
        $result = $bdd->prepare('SELECT nom FROM langage_de_programmation WHERE nom LIKE :term');
        $result->execute(array('term' => '%' . $term . '%'));

        while ($row = $result->fetch()) {
            $return_arr[] = $row['nom'];
        }
        return json_encode($return_arr);
    }

    // Recherche dans la base de données si le langage existe
    function searchProgrammingLanguage($langageName)
    {
        $bdd = getBdd();
        $result = $bdd->prepare('SELECT nom FROM langage_de_programmation WHERE nom = ?');
        $result->execute(array($langageName));
        if ($result->rowCount() == 1) {
            return $result->fetch();
        } else {
            throw new Exception("Aucun langage de programmation ne correspond à l'identifiant '$nom'");
        }
    }
}
