<?php $titre = $cours['nom']; ?>

<article>
    <header>
        <h1 class="titreCours"><?= $cours['nom'] ?></h1>
        <span data-i18n="duree">Durée</span> : <?= $cours['duree'] ?><br />
        <span data-i18n="difficulte">Difficultée</span> : <?= $cours['difficulte'] ?><br />
    </header>
    <p><?= $cours['description'] ?></p>
</article>
<hr />
<header>
    <h1 id="titreLanguages"><span data-i18n="langagesVus">Langages de programmation vus dans</span> <?= $cours['name'] ?></h1>
</header>
<?php foreach ($langages_de_programmation as $langage_de_programmation) : ?>
    <p>
        <a href="index.php?action=confirmer&id=<?= $langage_de_programmation['id'] ?>">
            <span data-i18n="supprimer">[Supprimer]</span>
        </a>
        <a href="index.php?action=modifier&id=<?= $langage_de_programmation['id'] ?>">
            [Modifier]
        </a>
    <h3><?= $langage_de_programmation['nom'] ?></h3>
    <?= $langage_de_programmation['description'] ?>
    </p>
<?php endforeach; ?>

<form action="index.php?action=langage_de_programmation" method="post">
    <h2><span data-i18n="ajoutLangage">Ajouter un langage de programmation</span></h2>
    <p>
        <label for="nom"><span data-i18n="nom">Nom</span></label> : <input type="text" name="nom" id="auto" /><br />
        <label for="description"><span data-i18n="description">Description</span></label> :
        <textarea type="text" name="description" id="descriptionAuto">Écrivez votre description ici</textarea><br />
        <input type="hidden" name="cours_id" value="<?= $cours['id'] ?>" /> <br />
        <input type="submit" value="Envoyer" />
    </p>
</form>