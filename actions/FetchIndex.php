<?php

session_start();

use Models\CourseModel;
require_once '../models/CourseModel.php';

$courseModel = new CourseModel();

$ListCourses = $courseModel->getAllCoursesIndex();

echo json_encode($ListCourses);
