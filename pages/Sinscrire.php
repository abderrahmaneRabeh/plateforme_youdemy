<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>YouDemy - Register</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../assets/img/ycd.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1E88E5;
            --light-primary: #90CAF9;
            --dark: #343a40;
        }

        body {
            background: linear-gradient(rgba(30, 136, 229, 0.8), rgba(30, 136, 229, 0.8)), url('../assets/img/header.jpg');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
            margin: 0 auto;
        }

        .login-title {
            color: var(--primary);
            text-align: center;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 5px;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(30, 136, 229, 0.25);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 12px;
            width: 100%;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary:hover {
            background-color: #1976D2;
            border-color: #1976D2;
        }

        .social-login {
            text-align: center;
            margin-top: 20px;
        }

        .social-login a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            background-color: #f8f9fa;
            color: var(--dark);
            margin: 0 5px;
            transition: all 0.3s;
        }

        .social-login a:hover {
            background-color: var(--primary);
            color: white;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: var(--dark);
        }

        .login-link a {
            color: var(--primary);
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .invalid-feedback {
            display: none;
            color: #dc3545;
            font-size: 80%;
            margin-top: -15px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-container">
            <div class="text-center mb-4">
                <a href="../index.php" style="text-decoration: none;">
                    <h1 class="login-title m-0 text-uppercase"><i class="fa fa-book-reader mr-3"></i>YouDemy</h1>
                </a>
                <p class="text-muted my-3">Cr&eacute;ez votre compte pour commencer &agrave; apprendre</p>
            </div>
            <form id="registerForm" novalidate>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" placeholder="Nom complet" required>
                    <div class="invalid-feedback">Veuillez entrer votre nom complet</div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" placeholder="Adresse e-mail" required>
                    <div class="invalid-feedback">Veuillez entrer une adresse e-mail valide</div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" placeholder="Mot de passe" required>
                    <div class="invalid-feedback">Le mot de passe doit contenir au moins 6 caract&egrave;res</div>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="confirmPassword"
                        placeholder="Confirmez le mot de passe" required>
                </div>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
            </form>
            <div class="login-link">
                <p>D&eacute;j&agrave; un compte ? <a href="./seConnecter.php">Connexion</a></p>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

</body>

</html>