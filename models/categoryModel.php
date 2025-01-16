<?php

namespace Models;

use Classes\Database;
use Classes\Category;
require_once '../classes/Database.php';
require_once '../classes/Category.php';
class CategoryModel
{

    public $CategoryPerPage = 6;

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    public function Nbr_Category()
    {
        $query = $this->db->prepare("SELECT count(*) AS total FROM categories");
        $query->execute();
        $result = $query->fetch();
        return $result['total'];
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

    public function getCategoriesDetails($page = 1)
    {
        $offset = ($page - 1) * $this->CategoryPerPage;
        $sql = "SELECT * FROM categories LIMIT :offset, :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->bindValue(':limit', $this->CategoryPerPage, \PDO::PARAM_INT);
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

    public function deleteCategory($id_category)
    {
        $sql = "DELETE FROM categories WHERE id_category = :id_category";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_category', $id_category);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function GetCategoryById($id_category)
    {
        $sql = "SELECT * FROM categories WHERE id_category = :id_category";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_category', $id_category);
        $stmt->execute();
        $category = $stmt->fetch();
        $categoryObj = new category($category['id_category'], $category['category_name']);
        return $categoryObj;
    }

    public function updateCategory($id_category, $category_name)
    {
        $sql = "UPDATE categories SET category_name = :category_name WHERE id_category = :id_category";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_category', $id_category);
        $stmt->bindValue(':category_name', $category_name);
        $stmt->execute();
        return $stmt->rowCount();
    }
}