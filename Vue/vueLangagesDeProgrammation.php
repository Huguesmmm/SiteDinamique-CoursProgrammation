<?php $this->titre = 'Cours de programmation v0.1.0.1'; ?>

<?php foreach ($langages_de_programmation as $langage_de_programmation) : ?>
    <article>
        <header>
            <a href="<?= "cours.php?id=" . $langage_de_programmation['cours_id'] ?>">
                <h1 class="titreLangageProgrammation"><?= $langage_de_programmation['nom'] ?></h1>
            </a>
        </header>
        <p><?= $langage_de_programmation['description'] ?></p>
    </article>
    <hr />
<?php endforeach; ?>