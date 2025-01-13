<?php

namespace Actions;

use Models\Utilisateur_Model;
use Classes\Utilisateur;
use Classes\Etudiant;
use Classes\Enseignant;

session_start();

require_once '../models/Utilisateur_Model.php';
require_once '../classes/Utilisateur.php';
require_once '../classes/Enseignant.php';
require_once '../classes/Etudiant.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        $_SESSION['error_password'] = "Les mots de passe ne correspondent pas.";
        header('Location: ../pages/Sinscrire.php');
        exit();
    }

    $utilisateurModel = new Utilisateur_Model();

    $existEmail = $utilisateurModel->getElementByEmail($email);

    if ($existEmail) {
        $_SESSION['error_email'] = "Cet email est déjà utilisé.";
        header('Location: ../pages/Sinscrire.php');
        exit();
    }

    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    $objUtilisateur = new Utilisateur($nom, $email, $passwordHashed, $role);
    $id_utilisateur = $utilisateurModel->createNewUtilisateur($objUtilisateur, $passwordHashed);


    if ($role === 'etudiant') {
        $objEtudiant = new Etudiant($nom, $email, $passwordHashed, $role, $id_utilisateur);
        $etudiantModel = $utilisateurModel->createNewEtudiant($objEtudiant);

        if ($etudiantModel) {

            $etudinat = $utilisateurModel->getElementById($id_utilisateur);
            $_SESSION['utilisateur'] = $etudinat;

            header('Location: ../index.php');
            exit();
        }

    } elseif ($role === 'enseignant') {
        $objEnseignant = new Enseignant($nom, $email, $passwordHashed, false, $role, $id_utilisateur);
        $enseignantModel = $utilisateurModel->createNewEnseignant($objEnseignant);

        if ($enseignantModel) {

            $enseignant = $utilisateurModel->getElementById($id_utilisateur);
            $_SESSION['utilisateur'] = $enseignant;

            header('Location: ../pages/seConnecter.php');
            exit();
        }

    }
}