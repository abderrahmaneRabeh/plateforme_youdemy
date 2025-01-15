<?php

namespace Actions;

use Models\CategoryModel;

require_once '../models/CategoryModel.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $category_name = $_POST['category_name'];
    $category_id = $_POST['category_id'];

    $CategoryModel = new CategoryModel();
    $result = $CategoryModel->updateCategory($category_id, $category_name);
    if ($result) {
        $_SESSION['success'] = "La catégorie a été modifiée avec succès";
        header('Location: ../adminPanel/CategoryPanel.php');
        exit;
    } else {
        $_SESSION['error'] = "Catégorie non modifiée";
        header('Location: ../adminPanel/CategoryPanel.php');
        exit;
    }
} else {
    $_SESSION['error'] = "Une erreur s'est produite lors de la modification de la catégorie. Veuillez réessayer.";
    header('Location: ../adminPanel/CategoryPanel.php');
    exit;
}