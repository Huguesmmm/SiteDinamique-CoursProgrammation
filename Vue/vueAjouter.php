<?php $titre = "Ajouter un cours "; ?>
<?php ob_start(); ?>
<header>
    <h1 id="titreCoursProg">Ajouter un cours : </h1>
</header>
    <form action="index.php?action=ajouter" method="post">
        <h2>Ajout d'un cours</h2>
        <p>
            <label for="nom">Nom</label> :
            <input type="text" name="nom" id="nom" value="" /><br />
            <label for="description">Description</label> :
            <textarea type="text" name="description" id="description" ></textarea><br />
            <label for="difficulte">Difficulté</label> :
            <select name="difficulte" id="difficulte">
                <option value="facile">facile</option>
                <option value="moyenne">moyenne</option>
                <option value="difficile">difficile</option>
            </select><br />
            <label for="prive">Privé</label> :
            <input type="checkbox" name="prive" id="prive" />
            <input type="hidden" name="utilisateur_id" value="1">
            <input class="button" type="submit" value="Ajouter" />
            <input class="button" type="button" value="Annuler" name="annuler" onclick="history.back()"/>
        </p>
    </form>
<?php $contenu = ob_get_clean(); ?>
<?php require 'Vue/gabarit.php'; ?>