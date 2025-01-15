<?php
session_start();

use Models\AfficherListeCoursModel;
require_once '../models/AfficherListeCoursModel.php';

$courseModel = new AfficherListeCoursModel();

$listCoursObj = $courseModel->afficherCours(1);

// echo '<pre>';
// print_r($listCoursObj);
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>YouDemy - List Des courses</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="../assets/img/ycd.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/js/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <style>
        .img-fluid {
            background-size: cover;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark">
        <div class="row py-2 px-lg-5">
            <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center text-white">
                    <small><i class="fa fa-phone-alt mr-2"></i>+212679997258</small>
                    <small class="px-3">|</small>
                    <small><i class="fa fa-envelope mr-2"></i>rabehlife144@gmail.com</small>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-white px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-white px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-white pl-2" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0 px-lg-5">
            <a href="../index.php" class="navbar-brand ml-lg-3">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-book-reader mr-3"></i>YouDemy</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mx-auto py-0">
                    <a href="../index.php" class="nav-item nav-link ">Accueil</a>
                    <a href="./courses.php" class="nav-item nav-link active">Cours</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu m-0">
                            <a href="detail.html" class="dropdown-item">D&eacute;tail du cours</a>
                            <a href="feature.html" class="dropdown-item">Nos fonctionnalit&eacute;s</a>
                            <a href="team.html" class="dropdown-item">Instructeurs</a>
                            <a href="testimonial.html" class="dropdown-item">T&eacute;moignages</a>
                        </div>
                    </div>
                </div>
                <?php if (isset($_SESSION['utilisateur'])): ?>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle"
                            style="text-decoration: none;color: black;font-weight: bold;border-radius: 5px;padding: 5px 10px;background-color: #f5f5f5;"
                            data-toggle="dropdown"><?php echo $_SESSION['utilisateur']['nom']; ?></a>
                        <div class="dropdown-menu m-0" style="border-radius: 5px;">
                            <a href="mesCours.php" class="dropdown-item">Mes Cours</a>
                            <a href="../actions/lougout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="./seConnecter.php" class="btn btn-primary py-2 px-4 d-none d-lg-block">Se connecter</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center">
            <h1 class="text-white display-1">Courses</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase"><a class="text-white" href="">Home</a></p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">Courses</p>
            </div>

        </div>
    </div>
    <!-- Header End -->


    <!-- Courses Start -->
    <div class="container-fluid ">
        <div class="container">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center position-relative mb-5">
                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Nos Cours</h6>
                        <h1 class="display-5">Découvrez nos dernières publications de cours</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ($listCoursObj as $cours): ?>
                    <div class="col-lg-4 col-md-6 pb-4">
                        <a class="courses-list-item position-relative d-block overflow-hidden mb-2"
                            href="./CourseDetails.php?id=<?= $cours->id_cour ?>">
                            <img class="img-fluid" src="<?= $cours->imgPrincipale_cours ?>" alt="<?= $cours->titre_cour ?>">
                            <div class="courses-text">
                                <h4 class="text-center text-white px-3"><?= $cours->titre_cour ?></h4>
                                <div class="border-top w-100 mt-3">
                                    <div class="d-flex justify-content-between p-4">
                                        <span class="text-white"><i class="fa fa-user mr-2"></i><?= $cours->id_enseignant ?>
                                        </span>
                                        <span class="text-white"><?= $cours->category_id ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>

                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center mb-0">
                            <li class="page-item disabled">
                                <a class="page-link rounded-0" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link rounded-0" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->


    <!-- Footer Start -->
    <div class="container-fluid position-relative overlay-top bg-dark text-white-50 py-5" style="margin-top: 90px;">
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mt-n2 text-uppercase text-white"><i class="fa fa-book-reader mr-3"></i>YouDemy</h1>
                    </a>
                    <p class="m-0">YouDemy est une plateforme de formation en ligne qui propose des cours et des
                        formations dans divers domaines. Nous offrons des ressources &eacute;ducatives et des outils
                        pour vous aider &agrave; am&eacute;liorer vos comp&eacute;tences et &agrave; atteindre vos
                        objectifs.</p>
                </div>
                <div class="col-md-6 mb-5">
                    <h3 class="text-white mb-4">Abonnez-vous &agrave; notre newsletter</h3>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 30px;"
                                placeholder="Votre adresse e-mail">
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Inscrivez-vous</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 border-top py-4"
        style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                    <p class="m-0">Copyright &copy; <a class="text-white" href="#">YouDemy</a>. Tous droits
                        r&eacute;serv&eacute;s.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0">Crée par <a class="text-white" href="https://htmlcodex.com">Abderrahmane Rabeh</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary rounded-0 btn-lg-square back-to-top"><i
            class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/easing/easing.min.js"></script>
    <script src="../assets/js/waypoints/waypoints.min.js"></script>
    <script src="../assets/js/counterup/counterup.min.js"></script>
    <script src="../assets/js/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
</body>

</html>