<?php

namespace Classes;
use Classes\Utilisateur;
require_once 'Utilisateur.php';

class Etudiant extends Utilisateur
{
    private $id_etudiant;
    private $is_baned;

    public function __construct($nom, $email, $password, $is_baned = 0, $role = 'etudiant', $id_utilisateur = null, $id_etudiant = null)
    {
        parent::__construct($nom, $email, $password, $role, $id_utilisateur);
        $this->id_etudiant = $id_etudiant;
        $this->is_baned = $is_baned;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

}
