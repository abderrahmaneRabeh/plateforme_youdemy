<?php


namespace Classes;

class Tag
{
    public $id_tag;
    public $tag_name;


    public function __construct($tag_name, $id_tag = null)
    {
        $this->tag_name = $tag_name;
        $this->id_tag = $id_tag;
    }

    public function __get($attr)
    {
        return $this->$attr;
    }
}