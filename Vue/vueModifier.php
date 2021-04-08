<?php $titre = 'Modifier ' . $langage_de_programmation['nom']; ?>

<?php ob_start(); ?>

<form action="index.php?action=mettre_a_jour" method="post">
    <h2>Modifier le langage de programmation : </h2>
    <p>
        <label for="nom">Langage de programmation</label> : <input type="text" name="nom" id="nom"
                                                                   value="<?= $langage_de_programmation['nom'] ?>"
        <label for="description">Description</label> : <textarea name="description" id="description"></textarea>
        <input type="hidden" name="id" value="<?= $langage_de_programmation['id'] ?>" /><br/>
        <input type="hidden" name="cours_id" value="<?= $langage_de_programmation['cours_id'] ?>"/><br/>
        <input type="submit" value="Modifier"/>
    </p>
</form>
<form action="index.php" method="get">
    <input type="hidden" name="action" value="cours"/>
    <input type="hidden" name="id" value="<?= $langage_de_programmation['cours_id'] ?>"/>
    <input type="submit" value="Annuler"/>
</form>
