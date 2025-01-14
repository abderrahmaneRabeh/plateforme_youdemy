<?php

namespace Models;

use Classes\Database;
require_once '../classes/Database.php';

class EtudiantModel
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function SetBannedEtudiant($id_utilisateur, $is_baned)
    {
        $sql = "UPDATE etudiants SET is_baned = :is_baned WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_utilisateur', $id_utilisateur);
        $stmt->bindValue(':is_baned', $is_baned);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function DeleteEtudiant($id_utilisateur)
    {
        $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_utilisateur', $id_utilisateur);
        $stmt->execute();
        return $stmt->rowCount();
    }
}