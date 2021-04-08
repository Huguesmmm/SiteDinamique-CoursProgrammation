<!<!doctype html>
<html>
    <head>
        <title>Ajouter</title>
    </head>
    <style>
        form {
            text-align: center;
        }
        .button{
            background-color: #008CBA;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
        }
    </style>
    <body>
        <form action="cours_envoyer.php" method="post">
            <h2>Ajouter un cours V0.0.1</h2>
            <p>
                <label for="nom">Nom</label> : 
                <input type="text" name="nom" id="nom" value="" /><br />
                <label for="description">Description</label> : 
                <textarea type="text" name="description" id="description" ></textarea><br />
                <label for="difficulte">Difficulté</label> : 
                <select name="difficulte" id="difficulte">
                    <option value="facile">facile</option>
                    <option value="moyenne">moyenne</option>
                    <option value="difficile">difficile</option>
                </select><br />
                <label for="prive">Privé</label> : 
                <input type="checkbox" name="prive" id="prive" />
                <input type="hidden" name="utilisateur_id" value="1">
                <input class="button" type="submit" value="Ajouter" />
                <input class="button" type="button" value="Annuler" name="annuler" onclick="history.back()"/>
            </p>
        </form>
    </body>
</html>


