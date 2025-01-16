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

    public function getInscriptions()
    {
        $sql = "SELECT * FROM inscription";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $inscriptions = $stmt->fetchAll();
        $inscriptionsObj = [];

        foreach ($inscriptions as $insc) {
            $inscriptionsObj[] = new Inscription($insc['id_etudiant'], $insc['id_cour'], $insc['date_insc'], $insc['id_insc']);
        }

        return $inscriptionsObj;
    }
    public function getUserInscriptions($id_etudiant, $id_cour)
    {
        $sql = "SELECT * FROM inscription WHERE id_etudiant = :id_etudiant and id_cour = :id_cour";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_etudiant', $id_etudiant);
        $stmt->bindValue(':id_cour', $id_cour);
        $stmt->execute();
        return $stmt->rowCount();
    }
}

