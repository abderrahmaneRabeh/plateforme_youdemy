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

    public function getEnseignantInscriptions($id_enseignant)
    {
        $sql = "SELECT  co.id_cour,
                        co.titre_cour,
                        COUNT(i.id_etudiant) as total_etudiants,
                        MIN(i.date_insc) as first_insc_date
                FROM inscription i 
                JOIN cours co ON i.id_cour = co.id_cour 
                WHERE co.id_enseignant = :id_enseignant 
                GROUP BY co.id_cour, co.titre_cour";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_enseignant', $id_enseignant);
        $stmt->execute();
        return $stmt->fetchAll();

        // min(i.date_insc) as first_insc_date pour obtenir la date de la première inscription
    }


    public function countEtudiantInscriptions($id_cour)
    {
        $sql = "SELECT COUNT(id_etudiant) as total_etudiants FROM inscription WHERE id_cour = :id_cour group BY id_cour";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cour', $id_cour);
        $stmt->execute();
        return $stmt->fetch()['total_etudiants'];
    }

    public function CourseEtudiantInscite($id_cour)
    {
        $sql = "SELECT * from utilisateurs u JOIN etudiants e on u.id_utilisateur = e.id_utilisateur JOIN inscription i on i.id_etudiant = e.id_etudiant JOIN cours c on c.id_cour = i.id_cour WHERE c.id_cour = :id_cour";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_cour', $id_cour);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function countTotalEtudiantsInscrits()
    {
        $sql = "SELECT COUNT(DISTINCT id_etudiant) as total_etudiants FROM inscription";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total_etudiants'];
    }


    public function countTotalCours()
    {
        $sql = "SELECT COUNT(*) as total_cours FROM cours";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total_cours'];
    }

}


