<?php

namespace Models;

use Classes\Database;
use Classes\Tag;

require_once '../classes/Tag.php';
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
        $tags = $stmt->fetchAll();

        foreach ($tags as $tag) {
            $id_tag = $tag['id_tag'];
            $tag_name = $tag['tag_name'];

            $tagsObj[] = new Tag($tag_name, $id_tag);
        }

        return $tagsObj;
    }

    public function getTagById($id_tag)
    {
        $sql = "SELECT * FROM tags WHERE id_tag = :id_tag";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_tag', $id_tag);
        $stmt->execute();
        $tag = $stmt->fetch();

        $tagObj = new Tag($tag['tag_name'], $tag['id_tag']);

        return $tagObj;
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

    public function getCoursTags($id_cours)
    {
        $sql = "SELECT * FROM cours_tags join tags on cours_tags.id_tag = tags.id_tag WHERE id_cour = :id_cour";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cour', $id_cours);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function DeleteCoursTags($id_cours)
    {
        $sql = "DELETE FROM cours_tags WHERE id_cour = :id_cour";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cour', $id_cours);
        $stmt->execute();
        return $stmt->rowCount();
    }


    public function createNewTag($tag)
    {
        $sql = "INSERT INTO tags (tag_name) VALUES (:tag_name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':tag_name', $tag);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteTag($id_tag)
    {
        $sql = "DELETE FROM tags WHERE id_tag = :id_tag";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_tag', $id_tag);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updateTag($id_tag, $tag)
    {
        $sql = "UPDATE tags SET tag_name = :tag_name WHERE id_tag = :id_tag";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_tag', $id_tag);
        $stmt->bindValue(':tag_name', $tag);
        $stmt->execute();
        return $stmt->rowCount();
    }
}