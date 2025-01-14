<?php


namespace Actions;

use Models\EtudiantModel;
session_start();

require_once '../models/EtudiantModel.php';

if (isset($_GET['utilisateurId'])) {

    $id = $_GET['utilisateurId'];

    $etudiantModel = new EtudiantModel();

    $result = $etudiantModel->DeleteEtudiant($id);

    if ($result) {
        $_SESSION['success_etudiant'] = "L'etudiant a été supprimé avec succès !";
        header('Location: ../adminPanel/UtilisateursPanel.php');
        exit();
    } else {
        $_SESSION['error_etudiant'] = "L'etudiant n'a pas pu être supprimé.";
        header('Location: ../adminPanel/UtilisateursPanel.php');
        exit();
    }
} else {
    $_SESSION['error_etudiant'] = "Une erreur s'est produite lors de la suppression de l'etudiant.";
    header('Location: ../adminPanel/UtilisateursPanel.php');
    exit();
}


