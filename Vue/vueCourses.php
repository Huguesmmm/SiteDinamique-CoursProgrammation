<?php $this->titre = 'Cours de programmation v0.3.0.1'; ?>

    <a href="index.php?action=nouveauCours">
        <h2 class="titreCours">Ajouter un cours</h2>
    </a>

<?php foreach ($courses as $cours) : ?>
    <article>
        <header>
            <a href="<?= "index.php?action=cours&id=" . $cours['id'] ?>">
                <h1 class="titreCours"><?= $cours['nom'] ?></h1>
                <p><span class="material-icons ui-icon-data">&#xe26b;</span>
                    <?= $cours['difficulte'] ?>&nbsp;&nbsp;<span
                            class="material-icons ui-icon-clock">&#xe425;</span><?= $cours['duree'] ?> heures
                    <br/>
                    <span class="material-icons ui-icon-clock">&#xe853;</span>
                    Inscription : <?= $cours['utilisateur_id'] ?>
                </p>
            </a>
        </header>
        <p><?= $cours['description'] ?></p>

    </article>
    <hr/>
<?php endforeach; ?>