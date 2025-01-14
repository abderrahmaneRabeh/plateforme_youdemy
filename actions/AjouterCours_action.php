<?php

session_start();

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titre_cour = $_POST['titre_cour'];
    $imgPrincipale_cours = $_POST['imgPrincipale_cours'];
    $imgSecondaire_cours = $_POST['imgSecondaire_cours'];
    $description_cours = $_POST['description_cours'];
    $category_id = $_POST['category_id'];
    $tags = $_POST['tags'];

    if (isset($_POST['contenu_cours_document']) || isset($_POST['contenu_cours_video'])) {


        if (empty($_POST['contenu_cours_document']) && !empty($_POST['contenu_cours_video'])) {
            echo "Le contenu du cours document est vide";
        }

        if (empty($_POST['contenu_cours_video']) && !empty($_POST['contenu_cours_document'])) {
            echo "Le contenu du cours video est vide";
        }
    }



    foreach ($tags as $tag) {

    }

}