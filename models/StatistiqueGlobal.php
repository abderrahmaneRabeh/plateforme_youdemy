<?php


namespace Models;
use Classes\Database;
require_once '../classes/Database.php';

class StatistiqueGlobal
{

    private $db;


    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getData($table)
    {
        $sql = "SELECT count(*) AS 'total' FROM $table";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch()['total'];
    }

    public function Nombre_total_cours()
    {
        return $this->getData('cours');
    }
    public function Nombre_total_utilisateurs()
    {
        return $this->getData('utilisateurs');
    }
    public function Nombre_total_Inscriptions()
    {
        return $this->getData('inscription');
    }
    public function Nombre_total_Categories()
    {
        return $this->getData('categories');
    }
    public function Nombre_total_Tags()
    {
        return $this->getData('tags');
    }
}