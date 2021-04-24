<?php

abstract class Modele
{

    // Objet PDO d'accès à la BD
    private $bdd;

    // Exécute une requête SQL éventuellement paramétrée
    protected function executerRequete($sql, $params = null)
    {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql);    // exécution directe
        } else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    private function getBdd()
    {
        if ($this->bdd == null) {
            $bdd = new PDO('mysql:host=localhost;dbname=cours_programmation_v0_1_0_1;charset=utf8',
                'root', 'mysql',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $bdd;
    }
}



