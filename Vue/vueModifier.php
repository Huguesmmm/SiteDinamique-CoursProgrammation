<?php $titre = 'Modifier ' . $langage_de_programmation['nom']; ?>

<?php ob_start(); ?>
<header>
    <h1 id="titreCoursProg"><span data-i18n="titreAjoutCours">Modifier un cours : </span></h1>
</header>
<form action="index.php?action=mettre_a_jour&id=" method="post">
    <h2>Modifier le langage de programmation : </h2>
    <p>
        <label for="nom">Langage de programmation</label> : <input type="text" name="nom" id="nom"
                                                                   value="<?= $langage_de_programmation['nom'] ?>"
        <label for="description">Description</label> : <textarea name="description" id="description"></textarea>
        <label for="courriel"> Courriel (a@b.c): </label> <input type="text" name="courriel" id="courriel" value="<?= $langage_de_programmation['courriel'] ?>"/>
        <?= ($erreur == 'courriel') ? '<span style="color : red;"> Entrez un courriel valide</span>' : '' ?> </br>
        <label for="url">Site (url): </label> <input type="text" name="url" id ="url" value="<?= $langage_de_programmation['url'] ?>" /></br>
        <?= ($erreur == 'url') ? '<span style="color : red;"> Entrez un URL valide</span>' : '' ?> </br>
        <input type="hidden" name="id" value="<?= $langage_de_programmation['id'] ?>" /><br/>
        <input type="hidden" name="cours_id" value="<?= $langage_de_programmation['cours_id'] ?>"/><br/>
        <input type="submit" value="Modifier"/>
    </p>
</form>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="cours"/>
    <input type="hidden" name="id" value="<?= $langage_de_programmation['cours_id'] ?>"/>
    <input type="submit" value="Annuler"/>
</form>

<?php ob_get_clean(); ?>
<?php require 'Vue/gabarit.php';?>
