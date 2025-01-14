<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $titre_cour = $_POST['titre_cour'];
    $imgPrincipale_cours = $_POST['imgPrincipale_cours'];
    $imgSecondaire_cours = $_POST['imgSecondaire_cours'];
    $description_cours = $_POST['description_cours'];
    $contenu_cours = $_POST['contenu_cours'];
    $category_id = $_POST['category_id'];
    $tags = $_POST['tags'];

    foreach ($tags as $tag) {

    }

}