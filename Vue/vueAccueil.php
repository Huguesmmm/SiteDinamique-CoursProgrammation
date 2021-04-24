<?php $this->titre = 'Accueil - Cours de programmation version MVC'; ?>

<p data-i18n="Bienvenue">Je vous souhaite la bienvenue à cette présentation de cours de programmation.</p>
<?php foreach ($courses as $cours) : ?>
    <article>
        <header>
            <a href="<?= "index.php?action=cours&id=" . $cours['id'] ?>">
                <h1 class="titreCours"><?= $cours['nom'] ?></h1>
            </a>
            <ul style="list-style-type: none;">
                <li><span data-i18n="duree">Durée</span> : <?= $cours['duree'] ?></li>
                <li><span data-i18n="difficulte">Difficulté</span> : <?= $cours['difficulte'] ?></li>
            </ul>
            <p><?= $cours['description']; ?></p>
        </header>
    </article>
    <hr />
<?php endforeach; ?>

<a href="index.php?action=nouveauCours">
    <span data-i18n="ajoutCours">[Ajouter un cours]</span>
</a>