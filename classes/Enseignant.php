<?php

namespace Classes;
use Classes\Utilisateur;
require_once 'Utilisateur.php';

class Enseignant extends Utilisateur
{

    private $id_enseignant;
    private $is_active;

    public function __construct($nom, $email, $password, $is_active, $id_utilisateur = null, $id_enseignant = null)
    {
        parent::__construct($id_utilisateur, $nom, $email, $password, 'enseignant');
        $this->id_enseignant = $id_enseignant;
        $this->is_active = $is_active;
    }


}