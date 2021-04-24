<?php $titre = "Ajouter un cours "; ?>
<header>
    <h1 id="titreCoursProg"><span data-i18n="titreAjoutCours">Ajouter un cours : </span></h1>
</header>
<form action="index.php?action=ajouter" method="post">
    <h2><span data-i18n="soustitreAjoutCours">Ajout d'un cours</span></h2>
    <label for="nom"><span data-i18n="nom">Nom</span></label> :
    <input type="text" name="nom" id="nom" value="" /><br />
    <label for="description"><span data-i18n="description">Description</span></label> :
    <textarea type="text" name="description" id="description"></textarea><br />
    <label for="difficulte"><span data-i18n="difficulte">Difficulté</span></label> :
    <select name="difficulte" id="difficulte">
        <option value="facile">facile</option>
        <option value="moyenne">moyenne</option>
        <option value="difficile">difficile</option>
    </select><br />
    <label for="duree"><span data-i18n="duree">Durée</span></label>
    <input type="number" name="duree" id="duree" value="" /><br />
    <label for="prive"><span data-i18n="prive">Privé</span></label> :
    <input type="checkbox" name="prive" id="prive" />
    <input type="hidden" name="utilisateur_id" value="1">
    <input class="button" type="submit" value="Ajouter" />
    <input class="button" type="button" value="Annuler" name="annuler" onclick="history.back()" />
    </p>
</form>