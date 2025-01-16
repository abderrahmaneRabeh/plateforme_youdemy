<?php

namespace Models;

use Classes\Database;
use Classes\Course;
use Models\AfficherCours;

require_once '../classes/Database.php';
require_once '../classes/Course.php';
require_once '../models/AfficherCours.php';

class AfficherListeCoursModel extends AfficherCours
{

    private $db;
    public static $coursePerPage = 3;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function Nbr_Cours()
    {
        $query = $this->db->prepare("SELECT count(*) AS total FROM cours");
        $query->execute();
        $result = $query->fetch();
        return $result['total'];
    }

    public function afficherCours($page)
    {

        $offset = ($page - 1) * self::$coursePerPage;
        $sql = "SELECT * FROM cours co join categories ca on co.category_id = ca.id_category join enseignants en on co.id_enseignant = en.id_enseignant join utilisateurs u on en.id_utilisateur = u.id_utilisateur LIMIT :offset, :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->bindValue(':limit', self::$coursePerPage, \PDO::PARAM_INT);
        $stmt->execute();
        $courses = $stmt->fetchAll();

        // echo '<pre>';
        // print_r($courses);
        // echo '</pre>';

        $coursesObj = [];

        foreach ($courses as $course) {
            $coursesObj[] = new Course(
                $course['titre_cour'],
                $course['imgPrincipale_cours'],
                $course['imgSecondaire_cours'],
                $course['description_cours'],
                $course['contenu_cours'],
                $course['category_name'],
                $course['nom'],
                $course['is_video'],
                $course['id_cour']
            );
        }

        return $coursesObj;

    }

    public function AfficherCoursDetaille($id_cours)
    {
        $sql = "SELECT * FROM cours co join categories ca on co.category_id = ca.id_category join enseignants en on co.id_enseignant = en.id_enseignant join utilisateurs u on en.id_utilisateur = u.id_utilisateur WHERE co.id_cour = :id_cour";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cour', $id_cours);
        $stmt->execute();
        $course = $stmt->fetch();

        $courseObj = new Course(
            $course['titre_cour'],
            $course['imgPrincipale_cours'],
            $course['imgSecondaire_cours'],
            $course['description_cours'],
            $course['contenu_cours'],
            $course['category_name'],
            $course['nom'],
            $course['is_video'],
            $course['id_cour']
        );
        return $courseObj;


    }
}
