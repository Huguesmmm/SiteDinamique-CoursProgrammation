<?php $titre = 'Accueil - Cours de programmation version MVC'; ?>

<?php ob_start(); ?>
<p data-i18n="Bienvenue">Je vous souhaite la bienvenue à cette présentation de cours de programmation.</p>
<?php foreach($courses as $cours): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=cours&id=" . $cours['id'] ?>">
                <h1 class="titreCours"><?= $cours['name'] ?></h1>
            </a>
            <ul style="list-style-type: none;">
                <li><span data-i18n="duree">Durée : </span><?= $cours['duration']?></li>
                <li><span data-i18n="difficulte">Difficulté : </span><?= $cours['difficulty'] ?></li>
            </ul>
            <p><?= $cours['description']; ?></p>
        </header>
    </article>
    <hr/>
<?php endforeach; ?>

<a href="index.php?action=nouveauCours" >
    <span data-i18n="ajoutCours">[Ajouter un cours]</span>
</a>

<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit.php'; ?>
