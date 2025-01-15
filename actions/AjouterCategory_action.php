<?php

namespace Actions;

use Models\CategoryModel;
require_once '../models/CategoryModel.php';

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $category_name = $_POST['category_name'];

    $CategoryModel = new CategoryModel();
    $result = $CategoryModel->addCategory($category_name);
    if ($result) {
        $_SESSION['success'] = "Catégorie ajoutée avec succès";
        header('Location: ../adminPanel/CategoryPanel.php');
        exit;
    } else {
        $_SESSION['error'] = "Catégorie non ajoutée";
        header('Location: ../adminPanel/CategoryPanel.php');
        exit;
    }
} else {
    $_SESSION['error'] = "Une erreur s'est produite lors de l'ajout de la catégorie. Veuillez réessayer.";
    header('Location: ../adminPanel/CategoryPanel.php');
    exit;
}