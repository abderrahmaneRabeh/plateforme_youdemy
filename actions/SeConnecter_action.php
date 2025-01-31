<?php


namespace Actions;
use Models\Utilisateur_Model;

session_start();

require_once '../models/Utilisateur_Model.php';
require_once '../classes/Utilisateur.php';
require_once '../classes/Enseignant.php';
require_once '../classes/Etudiant.php';

$utilisateurModel = new Utilisateur_Model();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];



    $utilisateur = $utilisateurModel->getElementByEmail($email);

    if (!$utilisateur) {
        $_SESSION['error_email'] = "Cet email n'existe pas.";
        header('Location: ../pages/seConnecter.php');
        exit();
    }

    if (!password_verify($password, $utilisateur['pw'])) {
        $_SESSION['error_password'] = "Le mot de passe est incorrect.";
        header('Location: ../pages/seConnecter.php');
        exit();
    }

    if ($utilisateur['role'] === 'enseignant') {
        $enseignant = $utilisateurModel->getUtilisateurEnseignantById($utilisateur['id_utilisateur']);
        $_SESSION['utilisateur'] = $enseignant;


        if ($enseignant['is_active'] == 0) {
            $_SESSION['error_enseignant'] = "L'enseignant n'est pas actif.";
            header('Location: ../pages/seConnecter.php');
            exit();

        } else {
            header('Location: ../enseignantPanel/StatistiquesPanel.php');
            exit();

        }

    } elseif ($utilisateur['role'] === 'etudiant') {
        $etudiant = $utilisateurModel->getElementById($utilisateur['id_utilisateur']);
        $_SESSION['utilisateur'] = $etudiant;
        header('Location: ../index.php');
        exit();
    } elseif ($utilisateur['role'] === 'administrateur') {

        $administrateur = $utilisateurModel->getElementById($utilisateur['id_utilisateur']);
        $_SESSION['utilisateur'] = $administrateur;
        header('Location: ../adminPanel/StatistiquesPanel.php');
        exit();
    }

}