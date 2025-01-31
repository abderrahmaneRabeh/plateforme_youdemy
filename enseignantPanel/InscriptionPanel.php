<?php

use Models\InscriptionModel;

require_once '../models/InscriptionModel.php';
require_once '../middlewares/AccessEnseignant.php';

session_start();
AccessEnseignant();

$inscriptionModel = new InscriptionModel();

$enseignantInscriptions = $inscriptionModel->getEnseignantInscriptions($_SESSION['utilisateur']['id_enseignant']);

if (isset($_GET['id_cour'])) {
    $id_cour = $_GET['id_cour'];
    $EtudinatCourseInscrit = $inscriptionModel->CourseEtudiantInscite($id_cour);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>YouDemy - Enseignant Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../../assets/img/ycd.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/dashboard.css">
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3><i class="fa fa-book-reader mr-2"></i>YouDemy</h3>
        </div>
        <div class="sidebar-menu">
            <a href="./StatistiquesPanel.php" class="menu-item">
                <i class="fas fa-tachometer-alt"></i>Dashboard
            </a>
            <a href="./CoursesPanel.php" class="menu-item">
                <i class="fas fa-graduation-cap"></i>Cours
            </a>
            <a href="./InscriptionPanel.php" class="menu-item active">
                <i class="fas fa-list-ol"></i>Inscriptions
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar d-flex justify-content-between align-items-center">
            <button class="btn btn-link d-md-none" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <div class="user-profile">
                <?php if (isset($_SESSION['utilisateur'])): ?>
                    <span><?php echo $_SESSION['utilisateur']['nom']; ?></span>
                <?php else: ?>
                    <span>Admin User</span>
                <?php endif; ?>
            </div>
            <a href="../actions/lougout.php"
                style="text-decoration: none;color: black;font-weight: bold;border-radius: 5px;padding: 5px 10px;background-color:rgb(1, 86, 255);"><i
                    class="
                fas fa-sign-out-alt" style="color: white;"></i></a>
        </div>
        <!-- Recent Activity -->
        <div class="recent-activity">
            <h4 class="mb-4">List D'inscription</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Cours</th>
                            <th>Titre du Cours</th>
                            <th>Date d'inscription (Première)</th>
                            <th>Nbr d'inscription</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($enseignantInscriptions as $inscription): ?>
                            <tr>
                                <td><?= $inscription['id_cour'] ?></td>
                                <td><?= $inscription['titre_cour'] ?></td>
                                <td><?= $inscription['first_insc_date'] ?></td>
                                <td>
                                    <a href="?id_cour=<?= $inscription['id_cour'] ?>">
                                        <?= $inscription['total_etudiants'] ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?php if (isset($_GET['id_cour'])): ?>
            <div class="student-list mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="mb-0">Liste des étudiants inscrits au
                        <span class="text-primary">
                            <?= $EtudinatCourseInscrit[0]['titre_cour'] ?>
                        </span>
                    </h4>
                    <button type="button" class="btn btn-primary" style="margin-left: 10px;"
                        onclick="window.location.href = window.location.href.split('?')[0]"><i class="fa fa-eye-slash"></i>
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID Étudiant</th>
                                <th>Nom de l'étudiant</th>
                                <th>Email de l'étudiant</th>
                                <th>Date d'inscription</th>
                            </tr>
                        </thead>
                        <tbody id="studentTableBody">

                            <?php foreach ($EtudinatCourseInscrit as $etd): ?>
                                <tr>
                                    <td><?= $etd['id_etudiant'] ?></td>
                                    <td><?= $etd['nom'] ?></td>
                                    <td><?= $etd['email'] ?></td>
                                    <td><?= $etd['date_insc'] ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php else: ?>
            <div></div>
        <?php endif; ?>

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar Toggle
        $("#sidebarToggle").click(function (e) {
            e.preventDefault();
            $(".sidebar").toggleClass("active");
            $(".main-content").toggleClass("active");
        });

        // Make menu items active on click
        $(".menu-item").click(function () {
            $(".menu-item").removeClass("active");
            $(this).addClass("active");
        });
    </script>
</body>

</html>