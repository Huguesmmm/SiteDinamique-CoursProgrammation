<?php $this->titre = 'Cours de programmation v0.1.0.1'; ?>

<?php foreach ($langagesDeProgrammation as $langageDeProgrammation) : ?>
    <article>
        <header>
            <a href="<?= "cours.php?id=" . $langageDeProgrammation['cours_id'] ?>">
                <h1 class="titreLangageProgrammation"><?= $langageDeProgrammation['nom'] ?></h1>
            </a>
        </header>
        <p><?= $langageDeProgrammation['description'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>