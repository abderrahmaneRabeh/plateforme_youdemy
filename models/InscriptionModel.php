<?php

namespace Models;

use Classes\Database;
use Classes\Inscription;

require_once '../classes/Database.php';
require_once '../classes/Inscription.php';

class InscriptionModel
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function AjouterNouvelleInscription($ObjInscription)
    {
        $sql = "INSERT INTO inscription(id_etudiant, id_cour) VALUES (:id_etudiant, :id_cour)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_etudiant', $ObjInscription->id_etudiant);
        $stmt->bindValue(':id_cour', $ObjInscription->id_cour);
        $stmt->execute();
        return $stmt->rowCount();
    }
}