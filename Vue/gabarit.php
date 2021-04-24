<!<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="Contenu/css/style.css"/>
    <link rel="stylesheet"
          href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css"
          type="text/css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title><?= $titre ?></title>   <!-- Élément spécifique -->
</head>
<body>
<div id="global">
    <header>
        <a href="#" class="lang-switch" data-locale="fr">Français</a>
        <a href="#" class="lang-switch" data-locale="en">English</a>
        <a href="#" class="lang-switch" data-locale="de">Deutsch</a>
        <a href="index.php"><h1 id="titreCoursProg"><span data-i18n="titreCoursProg">Cours de programmation</span></h1>
        </a>
    </header>
    <div id="contenu">
        <?= $contenu ?> <!-- Élément spécifique -->
    </div>
    <footer id="piedCoursProg">
        <span data-i18n="headerMessage">Site réalisé avec PHP, HTML5 et CSS.</span>
    </footer>
</div> <!-- #global -->
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script src="Contenu/js/autocompleteModele.js"
<script src="Contenu/jquery.i18n/libs/CLDRPluralRuleParser/src/CLDRPluralRuleParser.js"></script>
<script src="Contenu/jquery.i18n/src/jquery.i18n.js"></script>
<script src="Contenu/jquery.i18n/src/jquery.i18n.messagestore.js"></script>
<script src="Contenu/jquery.i18n/src/jquery.i18n.fallbacks.js"></script>
<script src="Contenu/jquery.i18n/src/jquery.i18n.language.js"></script>
<script src="Contenu/jquery.i18n/src/jquery.i18n.parser.js"></script>
<script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.js"></script>
<script src="Contenu/jquery.i18n/src/jquery.i18n.emitter.bidi.js"></script>
<script src="Contenu/i18n/main-jquery_i18n.js"></script>
</body>
</html>


