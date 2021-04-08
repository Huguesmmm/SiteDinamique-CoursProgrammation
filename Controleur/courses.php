<?php
    
require 'Modele/Modele.php';

try {
    $courses = getCourses();
    require 'Vue/vueCourses.php';
} catch (Exception $ex) {
    $msgErreur = $ex->getMessage();
    require 'Vue/vueErreur.php';
}




