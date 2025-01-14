<?php

namespace Classes;

class Course
{

    private $id_cour;
    private $titre_cour;
    private $imgPrincipale_cours;
    private $imgSecondaire_cours;
    private $description_cours;
    private $contenu_cours;
    private $category_id;
    private $id_enseignant;

    public function __construct($titre_cour, $imgPrincipale_cours, $imgSecondaire_cours, $description_cours, $contenu_cours, $category_id, $id_enseignant, $id_cour = null)
    {
        $this->id_cour = $id_cour;
        $this->titre_cour = $titre_cour;
        $this->imgPrincipale_cours = $imgPrincipale_cours;
        $this->imgSecondaire_cours = $imgSecondaire_cours;
        $this->description_cours = $description_cours;
        $this->contenu_cours = $contenu_cours;
        $this->category_id = $category_id;
        $this->id_enseignant = $id_enseignant;
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