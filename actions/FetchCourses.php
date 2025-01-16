<?php

session_start();

use Models\CourseModel;
require_once '../models/CourseModel.php';

$courseModel = new CourseModel();

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $ListCourses = $courseModel->fetchAll($search);
    echo json_encode($ListCourses);
}
