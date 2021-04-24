<?php

require_once 'Vue/Vue.php';
$courses = [
    [
        'id' => '100',
        'nom' => 'nom Test 1',
        'description' => 'description Test 1',
        'utilisateur_id' => '100',
        'duree' => '20',
        'difficulte' => 'facile',
        'prive' => '1'
    ],
    [
        'id' => '101',
        'nom' => 'nom Test 2',
        'description' => 'description Test 2',
        'utilisateur_id' => '100',
        'duree' => '100',
        'difficulte' => 'difficile',
        'prive' => '0'
    ]
];
$vue = new Vue('Courses');
$vue->generer(['courses' => $course]);