<?php

namespace Actions;

use Models\TagModel;
require_once '../models/TagModel.php';

session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $TagModel = new TagModel();

    $result = $TagModel->deleteTag($id);
    if ($result) {
        $_SESSION['success'] = "Le tag a été supprimé avec succès.";
        header('Location: ../adminPanel/TagsPanel.php');
        exit();
    } else {
        $_SESSION['error'] = "Une erreur s'est produite lors de la suppression du tag.";
        header('Location: ../adminPanel/TagsPanel.php');
        exit();
    }

} else {
    $_SESSION['error'] = "Id de tag introuvable | erreur.";
    header('Location: ../adminPanel/TagsPanel.php');
    exit();
}