<?php $titre = "Supprimer - " . $langage_de_programmation['nom']; ?>

<article>
    <header>
        <p>
        <h1>Supprimer?</h1>
        <strong><?= $langage_de_programmation['nom'] ?></strong>
        <?= $langage_de_programmation['description'] ?>
        </p>
    </header>
</article>

<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="id" value="<?= $langage_de_programmation['id'] ?>" /><br />
    <input type="submit" value="oui" />
</form>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="cours" />
    <input type="hidden" name="id" value="<?= $langage_de_programmation['cours_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>