<?php

require_once 'Modele/Modele.php';

class Type extends Modele
{
    public function searchType($term)
    {
        $sql = 'SELECT nom FROM type WHERE nom LIKE :term';
        $stmt = $this->executerRequete($sql, ['term' => '%' . $term]);

        while ($row = $stmt->fetch()){
            $return_arr[] = $row['nom'];
        }

        return json_encode($return_arr);
    }
}