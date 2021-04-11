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
    <hr />
    <header>
        <h1 id="titreLanguages">Langages de programmation vus dans <?= $cours['name'] ?></h1>
    </header>
    <?php foreach ($langages_de_programmation as $langage_de_programmation): ?>
        <p>
            <a href="index.php?action=confirmer&id=<?= $langage_de_programmation['id'] ?>">
                [Supprimer]
            </a>
            <h3><?= $langage_de_programmation['nom'] ?></h3>
            <?= $langage_de_programmation['description'] ?>
        </p>
    <?php endforeach; ?>
<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>


