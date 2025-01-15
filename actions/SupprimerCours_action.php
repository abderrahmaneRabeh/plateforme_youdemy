<?php

namespace Actions;

use Models\CourseModel;
require_once '../models/CourseModel.php';

session_start();

if ($_SESSION['utilisateur']['role'] != 'enseignant') {
    $redirect = '../adminPanel/CoursesPanel.php';
} else {
    $redirect = '../enseignantPanel/CoursesPanel.php';
}


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $courseModel = new CourseModel();

    $result = $courseModel->deleteCourse($id);

    if ($result) {
        $_SESSION['success'] = "Le cours a été supprimé avec succès !";
        header("Location: $redirect");
        exit();
    } else {
        $_SESSION['error'] = "Le cours n'a pas pu être supprimé.";
        header("Location: $redirect");
        exit();
    }


} else {
    $_SESSION['error'] = "Une erreur s'est produite lors de la suppression du cours.";
    header('Location: ../enseignantPanel/CoursesPanel.php');
    exit();
}

