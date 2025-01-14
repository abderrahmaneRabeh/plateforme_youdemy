<?php

namespace Models;

use Classes\Database;
use Classes\DocumentCourseHandler;
use Classes\VideoCourseHandler;

require_once '../classes/Database.php';
require_once '../classes/DocumentCourseHandler.php';
require_once '../classes/VideoCourseHandler.php';

class CourseModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function ajouterNouveauCourse($CourseObj)
    {
        $sql = "INSERT INTO cours(
        titre_cour, 
        imgPrincipale_cours, 
        imgSecondaire_cours, 
        description_cours, 
        contenu_cours, 
        category_id, 
        id_enseignant, 
        is_video
        ) VALUES (
        :titre_cour, 
        :imgPrincipale_cours, 
        :imgSecondaire_cours, 
        :description_cours, 
        :contenu_cours, 
        :category_id, 
        :id_enseignant, 
        :is_video)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':titre_cour', $CourseObj->titre_cour);
        $stmt->bindValue(':imgPrincipale_cours', $CourseObj->imgPrincipale_cours);
        $stmt->bindValue(':imgSecondaire_cours', $CourseObj->imgSecondaire_cours);
        $stmt->bindValue(':description_cours', $CourseObj->description_cours);
        $stmt->bindValue(':contenu_cours', $CourseObj->contenu_cours);
        $stmt->bindValue(':category_id', $CourseObj->category_id);
        $stmt->bindValue(':id_enseignant', $CourseObj->id_enseignant);
        $stmt->bindValue(':is_video', $CourseObj->is_video);
        $stmt->execute();
        return $this->db->lastInsertId();
    }
}