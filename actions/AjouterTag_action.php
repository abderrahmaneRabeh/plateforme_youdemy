<?php

namespace Actions;
use Models\TagModel;
require_once '../models/TagModel.php';

session_start();

$toutEffectue = true;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tag_name = $_POST['tag_name'];

    $TagModel = new TagModel();

    foreach ($tag_name as $tag) {

        $result = $TagModel->createNewTag($tag);

        if (!$result) {
            $toutEffectue = false;
        }

    }

    if ($toutEffectue) {
        $_SESSION['success'] = "Le tag a été ajouté avec succès !";
        header('Location: ../adminPanel/TagsPanel.php');
        exit();
    } else {
        $_SESSION['error'] = "Le tag n'a pas été ajouté. Veuillez réessayer.";
        header('Location: ../adminPanel/TagsPanel.php');
    }
} else {
    $_SESSION['error'] = "Une erreur s'est produite lors de l'ajout du tag. Veuillez réessayer.";
    header('Location: ../adminPanel/TagsPanel.php');
}