<?php

namespace Models;

use Classes\Database;
use Classes\Category;
require_once '../classes/Database.php';
require_once '../classes/Category.php';
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
        $category = $stmt->fetchAll();

        $categoryObj = [];

        foreach ($category as $cat) {

            $categoryObj[] = new Category($cat['id_category'], $cat['category_name']);

        }

        return $categoryObj;
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