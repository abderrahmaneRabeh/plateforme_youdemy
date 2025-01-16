<?php

namespace Classes;

class Inscription
{

    private $id_insc;
    private $id_etudiant;
    private $id_cour;
    private $date_insc;

    public function __construct($id_etudiant, $id_cour, $date_insc = null, $id_insc = null)
    {
        $this->id_insc = $id_insc;
        $this->id_etudiant = $id_etudiant;
        $this->id_cour = $id_cour;
        $this->date_insc = $date_insc;
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