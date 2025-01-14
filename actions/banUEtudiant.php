<?php


namespace Actions;

use Models\EtudiantModel;
session_start();

require_once '../models/EtudiantModel.php';

if (isset($_GET['id']) && isset($_GET['action'])) {

    $id_utilisateur = $_GET['id'];
    $action = $_GET['action'];

    if ($action == 1) {
        $msg = "Etudinat Activer avec Success";
    } else {
        $msg = "Etudinat banner avec Success";
    }

    $etudiantModel = new EtudiantModel();
    $result = $etudiantModel->SetBannedEtudiant($id_utilisateur, $action);

    if ($result) {
        $_SESSION['success_etudiant'] = $msg;
        header('Location: ../adminPanel/UtilisateursPanel.php');
        exit();
    } else {
        $_SESSION['error_etudiant'] = "Une erreur s'est produite lors de la gestion de l'utilisateur.";
        header('Location: ../adminPanel/UtilisateursPanel.php');
        exit();
    }
} else {
    $_SESSION['error_etudiant'] = "Une erreur s'est produite lors de la gestion de l'utilisateur.";
    header('Location: ../adminPanel/UtilisateursPanel.php');
    exit();
}