<?php

namespace Models;

use Classes\Database;
require_once '../classes/Database.php';


class TagModel
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllTags()
    {
        $sql = "SELECT * FROM tags";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function Ajouter_Tag_Courses($tag, $id_cours)
    {
        $sql = "INSERT INTO cours_tags(id_cour, id_tag) VALUES (:id_cour, :id_tag)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cour', $id_cours);
        $stmt->bindValue(':id_tag', $tag);
        $stmt->execute();
        return $stmt->rowCount();
    }
}