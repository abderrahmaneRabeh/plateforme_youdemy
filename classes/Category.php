<?php

namespace Models;


class Category
{
    private $id_category;
    private $category_name;

    public function __construct($id_category, $category_name)
    {
        $this->id_category = $id_category;
        $this->category_name = $category_name;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function __set($attr, $value)
    {
        $this->$attr = $value;
    }

}