<?php $titre = 'Cours de programmation v0.1.0.1'; ?>

<?php foreach ($courses as $cours): ?>
    <article>
        <header>
            <a href="<?= "Controleur/cours.php?id=" . $cours['id'] ?>">
                <h1 class="titreCours"><?= $cours['name'] ?></h1>
            </a>
        </header>
        <p><?= $cours['description'] ?></p>
    </article>
    <hr/>
<?php endforeach; ?>



