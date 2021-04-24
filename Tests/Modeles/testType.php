<?php

require_once 'Modele/Type.php';

echo '<h3>Test searchType(\'pro\') : </h3>';
$tstType = new Type;
$types = $tstType->searchType('pro');
var_dump($types);
