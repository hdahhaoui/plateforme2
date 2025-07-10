<?php 
require 'include/config.php';
require 'include/db.php';

if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])) {
    if ($_SESSION['USER_TYPE'] == 'client') {
        header('Location: client.php');
    } else {
        header('Location: projects/projects.php');
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>login</title>
</head>
<body>
    <!-- CONTAINER -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="row shadow-lg rounded-3 overflow-hidden w-100" style="max-width: 870px;">
            <!-- SIDE (Logo + Info) -->
            <div class="col-md-5 d-flex flex-column justify-content-center align-items-center px-0" style="background: linear-gradient(110deg,#337ab7 80%,#1e283d 100%);">
                <div class="w-100 d-flex flex-column justify-content-center align-items-center py-4">
                    <!-- LOGO CLIQUABLE -->
                    <a href="index.php" class="logo-login" title="Revenir à l'accueil">
                        <img src="img/logo-celutgc.png" alt="Logo CELUT-GC">
                    </a>
                    <h2 class="text-white fw-bold mt-2 mb-2" style="letter-spacing:1px;">CELUT-GC</h2>
                    <div class="text-white-40 mb-2 text-center" style="font-size:1.02rem;">Plateforme de collaboration</div>
                    <div class="text-white-50 small mb-2 text-center">Tout ce que vous faites sur CELUT-GC est lié à votre compte.</div>
                </div>
            </div>
            <!-- FORMULAIRE DE CONNEXION -->
            <div class="col-md-7 bg-white p-4">
                <h3 class="mb-4 text-center fw-bold" style="color:#337ab7;">Connexion</h3>
                <form method="post" action="login_check.php">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="username" name="username" required autocomplete="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                    </div>
                    <button type="submit" class="btn btn-main w-100 mt-2">Se connecter</button>
                </form>
                <div class="text-center mt-3">
                    <a href="signup.php" class="btn btn-secondary">Créer un compte</a>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <span>© <?php echo date("Y"); ?> CELUT-GC. Tous droits réservés.</span>
            <div class="footer-social">
                <a href="https://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="https://www.linkedin.com/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
