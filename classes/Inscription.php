<?php

namespace Classes;

class Inscription
{

    private $id_insc;
    private $id_etudiant;
    private $id_cour;

    public function __construct($id_etudiant, $id_cour, $id_insc = null)
    {
        $this->id_insc = $id_insc;
        $this->id_etudiant = $id_etudiant;
        $this->id_cour = $id_cour;
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