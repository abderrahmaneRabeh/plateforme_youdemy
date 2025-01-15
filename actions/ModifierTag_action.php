<?php

namespace Actions;
use Models\TagModel;
require_once '../models/TagModel.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tag_name = $_POST['tag_name'];
    $id_tag = $_POST['id_tag'];

    $TagModel = new TagModel();

    $result = $TagModel->updateTag($id_tag, $tag_name);

    if ($result) {
        $_SESSION['success'] = "Tag modifié avec succès.";
        header('Location: ../adminPanel/TagsPanel.php');
    } else {
        $_SESSION['error'] = "Tag non modifié.";
        header('Location: ../adminPanel/TagsPanel.php');
    }

} else {
    $_SESSION['error'] = "Une erreur s'est produite lors de l'ajout du tag. Veuillez réessayer.";
    header('Location: ../adminPanel/TagsPanel.php');
}