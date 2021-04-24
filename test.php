<?php
if (isset($_GET['test'])) {
    if ($_GET['test'] == 'modeleCours') {
        require 'Tests/Modeles/testCours.php';
    } else if ($_GET['test'] == 'modeleLangageDeProgrammation') {
        require 'Tests/Modeles/testLangageDeProgrammation.php';
    } else if ($_GET['test'] == 'vueCourses') {
        require 'Tests/Vues/testVueCourses.php';
    } else if ($_GET['test'] == 'vueConfirmer') {
        require 'Tests/Vues/testVueConfirmer.php';
    } else if ($_GET['test'] == 'vueErreur') {
        require 'Tests/Vues/testVueErreur.php';
    } else {
        echo '<h3>Test inexistant!!!</h3>';
    }
}
?>
<h3>Tests de Modèles</h3>
<ul>
    <li>
        <a href="test.php?test=modeleCours">Cours</a>
    </li>
    <li>
        <a href="test.php?test=modeleLangageDeProgrammation">Commentaire</a>
    </li>
</ul>
<h3>Tests de Vues</h3>
<ul>
    <li>
        <a href="test.php?test=vueCourses">Articles</a>
    </li>
    <li>
        <a href="test.php?test=vueConfirmer">Confirmer</a>
    </li>
    <li>
        <a href="test.php?test=vueErreur">Erreur</a>
    </li>
</ul>
