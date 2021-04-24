<?php

require_once 'Modele/LangageDeProgrammation.php';

$tstLangageDeProgrammation = new LangageDeProgrammation;
$langagesDeProgrammation = $tstLangageDeProgrammation->getProgrammationLanguages(1);
echo '<h3>Test getProgrammationLanguagesw : </h3>';
var_dump($langagesDeProgrammation->rowCount());

$langageDeProgrammation = $tstLangageDeProgrammation->getProgrammationLanguage(1);
echo '<h3>Test getProgrammationLanguage : </h3>';
var_dump($langageDeProgrammation);