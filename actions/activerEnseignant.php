<?php

namespace Actions;
use Models\Enseignant_model;

require_once '../models/Enseignant_model.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_utilisateur = $_POST['id'];
    $is_active = $_POST['is_active'];

    $enseignantModel = new Enseignant_model();

    $result = $enseignantModel->ActiverEnseignant($id_utilisateur, active: $is_active);

    if ($result) {
        $_SESSION['success_enseignant'] = "L'enseignant a été activé avec succès.";
        header('Location: ../adminPanel/UtilisateursPanel.php');
        exit();
    } else {
        $_SESSION['error_enseignant'] = "Une erreur s'est produite lors de l'activation de l'enseignant.";
        header('Location: ../adminPanel/UtilisateursPanel.php');
        exit();
    }
} else {
    $_SESSION['error_enseignant'] = "Une erreur s'est produite lors de l'activation de l'enseignant.";
    header('Location: ../adminPanel/UtilisateursPanel.php');
    exit();
}
