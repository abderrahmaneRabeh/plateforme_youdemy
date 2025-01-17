<?php

use Models\StatistiqueGlobal;

require_once '../middlewares/AdminAccess.php';
require_once '../models/StatistiqueGlobal.php';
session_start();
AdminAcess();


$statistiqueModel = new StatistiqueGlobal();
$TotalCourses = $statistiqueModel->Nombre_total_cours();
$totalUtilisateurs = $statistiqueModel->Nombre_total_utilisateurs();
$totalInscriptions = $statistiqueModel->Nombre_total_Inscriptions();
$totalCategories = $statistiqueModel->Nombre_total_Categories();
$totalTags = $statistiqueModel->Nombre_total_Tags();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>YouDemy - Admin Dashboard</title>
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
    <style>
        /* Enhanced Stats Cards Styling */
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.08);
            height: 100%;
            margin-bottom: 1rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-card i {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .stat-card h3 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0.5rem 0;
            background: linear-gradient(45deg, #0156FF, #0091ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-card p {
            color: #666;
            font-size: 1rem;
            margin: 0;
        }

        /* Icon specific backgrounds */
        .stat-card .fa-users {
            background: rgba(1, 86, 255, 0.1);
            color: #0156FF;
        }

        .stat-card .fa-graduation-cap {
            background: rgba(76, 175, 80, 0.1);
            color: #4CAF50;
        }

        .stat-card .fa-calendar-check {
            background: rgba(255, 152, 0, 0.1);
            color: #FF9800;
        }

        .stat-card .fa-tag {
            background: rgba(156, 39, 176, 0.1);
            color: #9C27B0;
        }

        /* Animation */
        @keyframes countUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-in {
            animation: countUp 0.5s ease-out forwards;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3><i class="fa fa-book-reader mr-2"></i>YouDemy</h3>
        </div>
        <div class="sidebar-menu">
            <a href="./StatistiquesPanel.php" class="menu-item active"><i
                    class="fas fa-tachometer-alt"></i>Dashboard</a>
            <a href="./UtilisateursPanel.php" class="menu-item"><i class="fas fa-users"></i>Utilisateurs</a>
            <a href="./CoursesPanel.php" class="menu-item"><i class="fas fa-graduation-cap"></i>Cours</a>
            <a href="./TagsPanel.php" class="menu-item"><i class="fas fa-tags"></i>Tags</a>
            <a href="./CategoryPanel.php" class="menu-item"><i class="fas fa-list"></i>Categories</a>
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
                    <h3><?= $totalUtilisateurs ?></h3>
                    <p>Utilisateurs Total</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-graduation-cap"></i>
                    <h3><?= $TotalCourses ?></h3>
                    <p>Cours Total</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-calendar-check"></i>
                    <h3><?= $totalInscriptions ?></h3>
                    <p>Inscriptions total</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-tag"></i>
                    <h3><?= $totalCategories ?></h3>
                    <p>Categories Total</p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <i class="fas fa-users"></i>
                    <h3><?= $totalTags ?></h3>
                    <p>Total Mots-Clé</p>
                </div>
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

        // Add this to your existing script section
        document.addEventListener('DOMContentLoaded', function () {
            // Animate numbers when in view
            const animateValue = (obj, start, end, duration) => {
                let startTimestamp = null;
                const step = (timestamp) => {
                    if (!startTimestamp) startTimestamp = timestamp;
                    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                    obj.innerHTML = Math.floor(progress * (end - start) + start);
                    if (progress < 1) {
                        window.requestAnimationFrame(step);
                    }
                };
                window.requestAnimationFrame(step);
            };

            // Create intersection observer
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        const endValue = parseInt(target.getAttribute('data-value'));
                        animateValue(target, 0, endValue, 2000);
                        entry.target.classList.add('animate-in');
                        observer.unobserve(target);
                    }
                });
            }, { threshold: 0.5 });

            // Observe all stat card numbers
            document.querySelectorAll('.stat-card h3').forEach(el => {
                const currentValue = el.innerHTML;
                el.setAttribute('data-value', currentValue);
                el.innerHTML = '0';
                observer.observe(el);
            });
        });
    </script>
</body>

</html>