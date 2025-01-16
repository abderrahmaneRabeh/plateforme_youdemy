<?php
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

if (isset($_GET['id_cour'])) {
    echo $_GET['id_cour'];
}