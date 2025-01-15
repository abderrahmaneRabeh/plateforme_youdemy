<?php

namespace Models;

use Classes\Database;
use Classes\Course;
use Models\AfficherCours;

require_once '../classes/Database.php';
require_once '../classes/Course.php';
require_once './AfficherCours.php';

class AfficherListeCoursModel extends AfficherCours
{

    private $db;
    public static $coursePerPage = 5;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function afficherCours($coursObj, $page)
    {

        $offset = ($page - 1) * self::$coursePerPage;
        $sql = "SELECT * FROM cours LIMIT :offset, :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->bindValue(':limit', self::$coursePerPage, \PDO::PARAM_INT);
        $stmt->execute();
        $courses = $stmt->fetchAll();

        $coursesObj = [];

        foreach ($courses as $course) {
            $coursesObj[] = new Course(
                $course['titre_cour'],
                $course['imgPrincipale_cours'],
                $course['imgSecondaire_cours'],
                $course['description_cours'],
                $course['contenu_cours'],
                $course['category_id'],
                $course['id_enseignant'],
                $course['is_video'],
                $course['id_cour']
            );
        }

        return $coursesObj;

    }
}

