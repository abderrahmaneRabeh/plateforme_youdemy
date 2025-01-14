<?php

namespace Actions;
use Models\Enseignant_model;

require_once '../models/Enseignant_model.php';

session_start();

if (isset($_GET['utilisateurId'])) {
    $id = $_GET['utilisateurId'];

    $enseignantModel = new Enseignant_model();

    $result = $enseignantModel->DeleteEnseignant($id);

    if ($result) {
        $_SESSION['success_enseignant'] = "L'ensignant a été supprimé avec succès !";
        header('Location: ../adminPanel/UtilisateursPanel.php');
        exit();
    } else {
        $_SESSION['error_enseignant'] = "L'enseignant n'a pas pu être supprimé.";
        header('Location: ../adminPanel/UtilisateursPanel.php');
        exit();
    }
} else {
    $_SESSION['error_enseignant'] = "Une erreur s'est produite lors de la suppression de l'enseignant.";
    header('Location: ../adminPanel/UtilisateursPanel.php');
    exit();
}

