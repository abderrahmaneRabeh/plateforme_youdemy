<?php

namespace Actions;

use Classes\Inscription;
use Models\InscriptionModel; // la class Insciption est includes dans fichier model
use Models\EtudiantModel;

require_once '../models/InscriptionModel.php';
require_once '../models/EtudiantModel.php';
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if (isset($_GET['id_cour'])) {

    $inscriptionModel = new InscriptionModel();
    $etudiantModel = new EtudiantModel();

    $id_cour = $_GET['id_cour'];
    $utilisateur_id = $etudiantModel->SelectedEtudiant($_SESSION['utilisateur']['id_utilisateur']);



    $ObjInscription = new Inscription($utilisateur_id['id_etudiant'], $id_cour);
    $result = $inscriptionModel->AjouterNouvelleInscription($ObjInscription);

    if ($result) {
        $_SESSION['success'] = "Inscription effectuée avec succès !";
        header("Location: ../pages/CourseDetails.php?id=$id_cour");
        exit();
    } else {
        $_SESSION['error'] = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
        header("Location: ../pages/CourseDetails.php?id=$id_cour");
        exit();
    }
} else {

    $_SESSION['error'] = "ID de cours non fourni.";
    header("Location: ../pages/CourseDetails.php?id=$id_cour");
    exit();
}