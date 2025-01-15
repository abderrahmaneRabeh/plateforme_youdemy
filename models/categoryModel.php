<?php

namespace Models;

use Classes\Database;
require_once '../classes/Database.php';

class CategoryModel
{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function addCategory($category_name)
    {
        $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':category_name', $category_name);
        $stmt->execute();
        return $stmt->rowCount();
    }
}