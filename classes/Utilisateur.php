<?php

namespace Classes;


class Utilisateur
{

    protected $id_utilisateur;
    protected $nom;
    protected $email;
    protected $password;

    protected $role;
    public function __construct($nom, $email, $password, $id_utilisateur = null, $role)
    {
        $this->id_utilisateur = $id_utilisateur;
        $this->nom = $nom;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }
}