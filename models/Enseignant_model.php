<?php


namespace Models;

use Classes\Database;
require_once '../classes/Database.php';


class Enseignant_model
{

    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function ActiverEnseignant($id_utilisateur, $active)
    {
        $sql = "UPDATE enseignants SET is_active= :active WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_utilisateur', $id_utilisateur);
        $stmt->bindValue(':active', $active);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function DeleteEnseignant($id_utilisateur)
    {
        $sql = "DELETE FROM enseignants WHERE id_utilisateur = :id_utilisateur";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_utilisateur', $id_utilisateur);
        $stmt->execute();
        return $stmt->rowCount();
    }
}