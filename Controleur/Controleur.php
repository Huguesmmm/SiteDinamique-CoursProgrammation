<?php

require 'Modele/Modele.php';

function accueil(){
    $courses = getCourses();
    require 'Vue/vueAccueil.php';
}

function aPropos(){
    require 'Vue/vueAPropos.php';
}

function cours($id, $erreur = '')
{
    $cours = getCours($id);
    $langages_de_programmation = getProgrammationLanguages($id);
    require 'Vue/vueCours.php';
}

function langage_de_programmation($langage_de_programmation){
    setProgrammationLanguage($langage_de_programmation);
    // Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php?action=cours&id=' . $langage_de_programmation['cours_id']);
}

function courses()
{
    $courses = getCourses();
    require 'Vue/vueCourses.php';
}

// Charge la vue pour l'ajout
function nouveauCours()
{
    require 'Vue/vueAjouter.php';
}

// Enregistre le nouveau cours et retourne l'accueil
function ajouter($cours)
{
    setCours($cours);
    header('Location: index.php');
}

// Confirmer la suppression d'un langage de programmation
function confirmer($id){
    // Lire le langage de programmation à l'aide du modèle
    $langage_de_programmation = getProgrammationLanguage($id);
    require 'Vue/vueConfirmer.php';
}

// Supprimer un langage de programmation
function supprimer($id){
    // Lire le langage de programmation afin d'obtenir le id de l'article associé
    $langage_de_programmation = getProgrammationLanguage($id);
    // Supprimer le langage de programmation à l'aide du modèle
    deleteProgrammationLanguage($id);
    // Recharger la page pour mettre à jour la liste des commentaires associés
    header('Location: index.php?action=cours&id=' . $langage_de_programmation['cours_id']);
}

// Affiche toutes les langages de programmation
function langages_de_programmation()
{
    $langages_de_programmation = getProgrammationLanguages();
    require 'Vue/vueLangagesDeProgrammation.php';
}

// Ajoute un langage de programmation
//function langage_de_programmation($cours_id)
//{
//    // vérifier si le cours existe
//    $cours = getCours($cours_id);
//    // Récupérer les données du formulaire
//    $langage_de_programmation = $_POST;
//    $validation_courriel = filter_var($langage_de_programmation['courriel'], FILTER_VALIDATE_EMAIL);
//    if ($validation_courriel) {
//        $validation_url = filter_var($langage_de_programmation['url'], FILTER_VALIDATE_URL);
//        if ($validation_url) {
//            // Ajouter le langage de programmation à l'aide du modèle
//            setProgrammationLanguages($langage_de_programmation);
//            // Recharger la page pour mettre à jour la liste des langage de programmation
//            header('Location: index.php?action=cours?id=' . $cours_id);
//        } else {
//            // Recharger la page avec une erreur près de l'url
//            header('Location: index.php?action=cours&id=' . $langage_de_programmation['cours_id'] . '&erreur=url');
//        }
//    } else {
//        // Recharger la page avec une erreur près du courriel
//        header('Location: index.php?action=cours&id=' . $langage_de_programmation['id'] . '&erreur=courriel');
//    }
//}

// Mettre à jour une chose à faire
function mettreAJour($id)
{
    // Vérifier si la chose à faire existe
    getProgrammationLanguage($id);
    // Récupérer les données du formulaire
    $langage_de_programmation = $_POST;
    $validation_courriel = filter_var($langage_de_programmation['courriel'], FILTER_VALIDATE_EMAIL);
    if ($validation_courriel) {
        $validation_url = filter_var($langage_de_programmation['url'], FILTER_VALIDATE_URL);
        if ($validation_url) {
            // Ajouter le langage de programmation
            updateProgrammationLanguage($langage_de_programmation);
            // Recharger la page pour mettre à jour la liste des langage de programmation associées
            header('Location: index.php?action=cours&id=' . $langage_de_programmation['cours_id']);

        } else {
            // Recharger la page avec une erreur près de l'url
            header('Location: index.php?action=modifier&id=' . $langage_de_programmation['id'] . '&erreur=url');
        }
    } else {
        // Recharger la page avec une erreur près du courriel
        header('Location: index.php?action=modifier&id=' . $langage_de_programmation['id'] . '&erreur=courriel');
    }

}
function erreur($msgErreur){
    require 'Vue/vueErreur.php';
}
