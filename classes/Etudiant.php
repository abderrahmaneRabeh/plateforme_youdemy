<?php

namespace Classes;
use Classes\Utilisateur;
require_once 'Utilisateur.php';

class Etudiant extends Utilisateur
{
    private $id_etudiant;

    public function __construct($nom, $email, $password, $role = 'etudiant', $id_utilisateur = null, $id_etudiant = null)
    {
        parent::__construct($id_utilisateur, $nom, $email, $password, $role);
        $this->id_etudiant = $id_etudiant;
    }

}