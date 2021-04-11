<?php
    
require 'Modele.php';

try {
    $langages_de_programmation = getProgrammationLanguages();
    require 'Vue/vueLangagesDeProgrammation.php';
} catch (Exception $ex) {
    $msgErreur = $ex->getMessage();
    require 'Vue/vueErreur.php';
}




