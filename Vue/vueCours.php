<!doctype html>
<?php $titre = $cours['nom']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="titreCours"><?= $cours['name'] ?></h1>
        Durée : <?= $cours['duration'] ?><br/>
        Difficultée : <?= $cours['difficulty'] ?><br/>
    </header>
    <p><?= $cours['description'] ?></p>
</article>
<hr/>
<header>
    <h1 id="titreLanguages"><span
                data-i18n="langagesVus">Langages de programmation vus dans</span> <?= $cours['name'] ?></h1>
</header>
<?php foreach ($langages_de_programmation as $langage_de_programmation): ?>
    <p>
        <a href="index.php?action=confirmer&id=<?= $langage_de_programmation['id'] ?>">
            <span data-i18n="supprimer">[Supprimer]</span>
        </a>
    <h3><?= $langage_de_programmation['nom'] ?></h3>
    <?= $langage_de_programmation['description'] ?>
    </p>
<?php endforeach; ?>

<form action="index.php?action=langage_de_programmation" method="post">
    <h2><span data-i18n="ajoutLangage">Ajouter un langage de programmation</span></h2>
    <p>
        <label for="nom">Nom</label> : <input type="text" name="nom" id="nom"/><br/>
        <label for="description">Description</label> :
        <textarea type="text" name="description" id="description">Écrivez votre description ici</textarea><br/>
        <input type="hidden" name="cours_id" value="<?= $cours['id'] ?>"/> <br/>
        <input type="submit" value="Envoyer"/>
    </p>
</form>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>


