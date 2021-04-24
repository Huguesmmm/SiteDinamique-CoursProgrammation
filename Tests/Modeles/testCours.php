<?php

require_once 'Modele/Cours.php';

$tstCours = new Cours;
$courses = $tstCours->getCourses();
echo '<h3>Test getCourses : </h3>';
var_dump($courses->rowCount());

echo '<h3>Test getCours : </h3>';
$cours = $tstCours->getCours(1);
var_dump($cours);
