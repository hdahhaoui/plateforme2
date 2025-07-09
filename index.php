<?php
// (Inclure ici vos éventuels includes PHP)
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>CELUT-GC - Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
    <!-- HEADER LOGO + TITRE + BOUTONS -->
    <div id="title-container">
        <div class="header-flex">
            <img src="img/logo-celutgc.png" alt="Logo CELUT-GC" class="logo-header">
            <div>
                <h2>CELUT-<span style="color:#FFD600;">GC</span></h2>
                <div class="subtitle">Collaboration • Entreprises • Laboratoires • Universités de Tlemcen</div>
            </div>
        </div>
        <p>
            CELUT-GC est la plateforme de référence pour connecter les partenaires socio-économiques
            avec les enseignants-chercheurs du département de Génie Civil.<br><br>
            Notre objectif : Accompagner, concrétiser et faciliter la collaboration de projets à fort impact.
        </p>
        <div class="btn-group">
            <a href="login.php" class="btn-main"><i class="fa-solid fa-right-to-bracket"></i> Se connecter</a>
            <a href="signup.php" class="btn-main btn-alt"><i class="fa-solid fa-user-plus"></i> S'inscrire</a>
            <a href="#decouvrir" class="btn-main btn-discover"><i class="fa-solid fa-compass"></i> Découvrir</a>
        </div>
    </div>

    <div class="container">
        <!-- SLIDER/DIAPORAMA AU MILIEU -->
        <div class="slider-container">
            <div class="slider">
                <div class="slide active">
                    <img src="img/slide1.jpg" alt="Photo 1" />
                    <div class="slide-caption">Lancement du CELUT-GC - Journée d'intégration 2024</div>
                </div>
                <div class="slide">
                    <img src="img/slide2.jpg" alt="Photo 2" />
                    <div class="slide-caption">Signature d'une nouvelle convention avec un partenaire</div>
                </div>
                <div class="slide">
                    <img src="img/slide3.jpg" alt="Photo 3" />
                    <div class="slide-caption">Bienvenue aux nouveaux étudiants et partenaires !</div>
                </div>
                <!-- Ajoute autant de slides que tu veux -->
            </div>
            <div class="slider-nav">
                <span class="slider-dot active" onclick="goToSlide(0)"></span>
                <span class="slider-dot" onclick="goToSlide(1)"></span>
                <span class="slider-dot" onclick="goToSlide(2)"></span>
            </div>
        </div>

        <!-- Carte Pourquoi rejoindre CELUT-GC -->
        <div class="card card-pourquoi">
            <h4>
                <span class="emoji-title">🤝</span>
                <span class="highlight-title">Pourquoi rejoindre <a style="color:#4662c2;text-decoration:none;font-weight:900;" href="#">CELUT-GC&nbsp;?</a></span>
            </h4>
            <div class="pourquoi-section">
                <b>Pour les Entreprises et Partenaires :</b>
                <ul>
                    <li>
                        <b>Concrétisez vos ambitions :</b> Proposez vos projets et trouvez les compétences pour les réaliser.
                    </li>
                    <li>
                        <b>Accélérez votre innovation :</b> Accédez directement à l'excellence de la recherche et à des technologies de pointe pour garder une longueur d'avance.
                    </li>
                    <li>
                        <b>Concevoir des solutions techniques avancées : </b> Construction 4.0. 
                    </li>
                </ul>
            </div>
            <div class="pourquoi-section">
                <b>Pour les Enseignants-Chercheurs :</b>
                <ul>
                    <li>
                        <b>Valorisez votre expertise :</b> Appliquez vos recherches à des défis industriels concrets et à fort impact.
                    </li>
                    <li>
                        <b>Découvrez de nouvelles opportunités :</b> Initiez des partenariats stratégiques et développez des projets de recherche appliquée.
                    </li>
                </ul>
            </div>
        </div>

        <!-- Carte Nos missions -->
        <div class="card card-missions" id="decouvrir">
            <h4>
                <span class="emoji-title">🌟</span>
                <span class="highlight-title">Nos missions</span>
            </h4>
            <ul class="missions-list">
                <li>Valorisation de la recherche appliquée</li>
                <li>Accompagnement des entreprises dans la résolution de problématiques concrètes</li>
                <li>Développement de projets collaboratifs et innovants</li>
                <li>Renforcement des liens université-entreprises-société</li>
            </ul>
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

    <!-- SCRIPT SLIDER -->
    <script>
    let slideIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.slider-dot');

    function showSlide(n) {
      slides.forEach((slide, idx) => {
        slide.classList.toggle('active', idx === n);
        dots[idx].classList.toggle('active', idx === n);
      });
      slideIndex = n;
    }
    function nextSlide() {
      let n = (slideIndex + 1) % slides.length;
      showSlide(n);
    }
    function goToSlide(n) {
      showSlide(n);
    }
    setInterval(nextSlide, 4200);

    showSlide(0);
    </script>
</body>
</html>
