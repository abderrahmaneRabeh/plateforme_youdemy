<?php
session_start();
require_once '../middlewares/AccessEnseignant.php';

AccessEnseignant();

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

        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <h3>1,234</h3>
                    <p>Total Users</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>56</h3>
                    <p>Total Courses</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-calendar-check"></i>
                    <h3>89</h3>
                    <p>Reservations</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-tag"></i>
                    <h3>23</h3>
                    <p>Categories</p>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="recent-activity">
            <h4 class="mb-4">Recent Activity</h4>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>Created new course</td>
                            <td>2024-01-14</td>
                            <td><span class="badge badge-success">Completed</span></td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>Updated profile</td>
                            <td>2024-01-14</td>
                            <td><span class="badge badge-info">In Progress</span></td>
                        </tr>
                        <tr>
                            <td>Mike Johnson</td>
                            <td>New reservation</td>
                            <td>2024-01-13</td>
                            <td><span class="badge badge-warning">Pending</span></td>
                        </tr>
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