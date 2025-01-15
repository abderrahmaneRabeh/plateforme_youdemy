<?php

namespace Actions;

use Models\CategoryModel;
require_once '../models/CategoryModel.php';

session_start();

$CategoryModel = new CategoryModel();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $CategoryModel->deleteCategory($id);

    if ($result) {
        $_SESSION['success'] = "Category deleted successfully.";
        header("Location: ../adminPanel/CategoryPanel.php");
        exit();
    } else {
        $_SESSION['error'] = "Failed to delete Category.";
        header("Location: ../adminPanel/CategoryPanel.php");
        exit();
    }

} else {
    $_SESSION['error'] = "Failed to delete Category.";
    header("Location: ../adminPanel/CategoryPanel.php");
    exit();
}