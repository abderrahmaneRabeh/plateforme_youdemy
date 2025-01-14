<?php

namespace Dashboard\Admin;
use Classes\Enseignant;
use Classes\Etudiant;
use Models\Utilisateur_Model;

require_once '../classes/Enseignant.php';
require_once '../classes/Etudiant.php';
require_once '../models/Utilisateur_Model.php';

$utilisateurModel = new Utilisateur_Model();

$utilisateursEnseignant = $utilisateurModel->getAllUtilisateursEnseignant();
$utilisateursEtudiant = $utilisateurModel->getAllUtilisateursEtudiant();

$utilisateursObjEtudiant = [];
$utilisateursObjEnseignant = [];

foreach ($utilisateursEnseignant as $utilisateur) {
    $nom = $utilisateur['nom'];
    $email = $utilisateur['email'];
    $role = $utilisateur['role'];
    $id_utilisateur = $utilisateur['id_utilisateur'];
    $is_active = $utilisateur['is_active'];

    $utilisateursObjEnseignant[] = new Enseignant($nom, $email, '', $is_active, $role, $id_utilisateur);
}

foreach ($utilisateursEtudiant as $utilisateur) {
    $nom = $utilisateur['nom'];
    $email = $utilisateur['email'];
    $role = $utilisateur['role'];
    $id_utilisateur = $utilisateur['id_utilisateur'];
    $is_baned = $utilisateur['is_baned'];

    $utilisateursObjEtudiant[] = new Etudiant($nom, $email, '', $is_baned, $role, $id_utilisateur);
}





session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>YouDemy - Utilisateurs</title>
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
            <a href="./StatistiquesPanel.php" class="menu-item"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
            <a href="./UtilisateursPanel.php" class="menu-item active"><i class="fas fa-users"></i>Utilisateurs</a>
            <a href="#" class="menu-item"><i class="fas fa-graduation-cap"></i>Cours</a>
            <a href="#" class="menu-item"><i class="fas fa-tags"></i>Tags</a>
            <a href="#" class="menu-item"><i class="fas fa-list"></i>Categories</a>
            <a href="#" class="menu-item"><i class="fas fa-calendar-check"></i>Réservations</a>
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
            <h4 class="mb-4">List Enseignant</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Account</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($_SESSION['success_enseignant'])): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $_SESSION['success_enseignant'];
                                unset($_SESSION['success_enseignant']); ?>
                            </div>
                        <?php elseif (isset($_SESSION['error_enseignant'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $_SESSION['error_enseignant'];
                                unset($_SESSION['error_enseignant']); ?>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($utilisateursObjEnseignant as $utilisateur): ?>

                            <?php if ($utilisateur->role === 'enseignant'): ?>
                                <tr>
                                    <td><?= $utilisateur->nom ?></td>
                                    <td><?= $utilisateur->email ?></td>
                                    <td><?= $utilisateur->role ?></td>
                                    <td class="text-center">
                                        <form action="../actions/activerEnseignant.php" method="post">
                                            <input type="hidden" name="id" value="<?= $utilisateur->id_utilisateur ?>">
                                            <?php if ($utilisateur->is_active != 0): ?>
                                                <i class="fas fa-check-circle text-success" style="margin-left: 5px;"></i>
                                            <?php else: ?>
                                                <select class="form-control" style="width: 105px; margin: 0 auto;" name="is_active"
                                                    onchange="this.form.submit()">
                                                    <option value="0" selected>Inactive</option>
                                                    <option value="1">Active</option>
                                                </select>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="../actions/DeleteEnseignant.php?utilisateurId=<?= $utilisateur->id_utilisateur ?>"
                                            onclick="return confirm('Etes-vous s ur de vouloir supprimer cet utilisateur ?')"
                                            class="btn btn-primary">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                </tr>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Recent Activity -->
        <div class="recent-activity mt-3">
            <h4 class="mb-4">List Etudiant</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">banned</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateursObjEtudiant as $utilisateur): ?>

                            <?php if ($utilisateur->role === 'etudiant'): ?>
                                <tr>
                                    <td><?= $utilisateur->nom ?></td>
                                    <td><?= $utilisateur->email ?></td>
                                    <td><?= $utilisateur->role ?></td>
                                    <td class="text-center">
                                        <?php if ($utilisateur->is_baned == 1): ?>
                                            <form action="./actions/UnbanEtudiant.php" method="post" style="display: inline;">
                                                <input type="hidden" name="id" value="<?= $utilisateur->id_utilisateur ?>">
                                                <button type="submit" class="btn btn-success btn-sm">Activate</button>
                                            </form>
                                        <?php else: ?>
                                            <form action="./actions/BanEtudiant.php" method="post" style="display: inline;">
                                                <input type="hidden" name="id" value="<?= $utilisateur->id_utilisateur ?>">
                                                <button type="submit" class="btn btn-danger btn-sm">Ban</button>
                                            </form>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="./utilisateurPanel.php?utilisateurId=<?= $utilisateur->id_utilisateur ?>"
                                            onclick="return confirm('Etes-vous s ur de vouloir supprimer cet utilisateur ?')"
                                            class="btn btn-primary">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>

                                </tr>
                            <?php endif; ?>

                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
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