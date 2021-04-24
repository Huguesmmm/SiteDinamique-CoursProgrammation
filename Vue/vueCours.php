<?php $this->titre = $cours['nom']; ?>

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
<?php foreach ($langagesDeProgrammation as $langageDeProgrammation) : ?>
    <p>
        <a href="index.php?action=confirmer&id=<?= $langageDeProgrammation['id'] ?>">
            <span data-i18n="supprimer">[Supprimer]</span>
        </a>
        <a href="index.php?action=modifier&id=<?= $langageDeProgrammation['id'] ?>">
            [Modifier]
        </a>
    <h3><?= $langageDeProgrammation['nom'] ?></h3>
    <?= $langageDeProgrammation['description'] ?>
    </p>
<?php endforeach; ?>

<form action="index.php?action=langageDeProgrammation" method="post">
    <h2><span data-i18n="ajoutLangage">Ajouter un langage de programmation</span></h2>
    <p>
        <label for="nom"><span data-i18n="nom">Nom</span></label> : <input type="text" name="nom" id="auto" /><br />
        <label for="description"><span data-i18n="description">Description</span></label> :
        <textarea type="text" name="description" id="descriptionAuto">Écrivez votre description ici</textarea><br />
        <input type="hidden" name="cours_id" value="<?= $cours['id'] ?>" /> <br />
        <input type="submit" value="Envoyer" />
    </p>
</form>