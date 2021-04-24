<?php $this->titre = "Supprimer - " . $langageDeProgrammation['nom']; ?>

<article>
    <header>
        <p>
        <h1>Supprimer?</h1>
        <strong><?= $langageDeProgrammation['nom'] ?></strong>
        <?= $langageDeProgrammation['description'] ?>
        </p>
    </header>
</article>

<form action="index.php?action=supprimer" method="post">
    <input type="hidden" name="id" value="<?= $langageDeProgrammation['id'] ?>" /><br />
    <input type="submit" value="oui" />
</form>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="cours" />
    <input type="hidden" name="id" value="<?= $langageDeProgrammation['cours_id'] ?>" />
    <input type="submit" value="Annuler" />
</form>