<?php

require_once 'Vue/Vue.php';
$langageDeProgrammation = [
    'id' => '999',
    'nom' => 'nom Test',
    'description' => 'description Test',
    'cours_id' => '100'
];
$vue = new Vue('Confirmer');
$vue->generer(['langageDeProgrammation' => $langageDeProgrammation]);
