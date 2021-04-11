<?php $titre = 'Accueil - Cours de programmation version MVC'; ?>

<?php ob_start(); ?>

<p date_i18n="Bienvenue">Bonjour et bienvenue!</p>

<?php foreach($courses as $cours): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=cours&id=" . $cours['id'] ?>">
                <h1 class="titreCours"><?= $cours['name'] ?></h1>
            </a>
            <ul style="list-style-type: none;">
                <li>Durée : <?= $cours['duration']?></li>
                <li>Difficulté : <?= $cours['difficulty'] ?></li>
            </ul>
            <p><?= $cours['description']; ?></p>
        </header>
    </article>
    <hr/>
<?php endforeach; ?>

<a href="index.php?action=nouveauCours" >
    [Ajouter un cours]
</a>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>
