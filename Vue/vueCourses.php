<?php $this->titre = 'Cours de programmation v0.3.0.1'; ?>

<?php foreach ($courses as $cours) : ?>
    <article>
        <header>
            <a href="<?= "Controleur/cours.php?id=" . $cours['id'] ?>">
                <h1 class="titreCours"><?= $cours['nom'] ?></h1>
                <p><?= $cours['duree']?> heures</p>
            </a>
        </header>
        <p><?= $cours['description'] ?></p>

    </article>
    <hr />
<?php endforeach; ?>