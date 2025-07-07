<?php

require 'include/config.php';
require 'include/db.php';

if (isset($_SESSION['USER_TYPE']) && $_SESSION['USER_TYPE']=='client') {
  header('Location: client.php');
  exit;
}
if (isset($_SESSION['USER_TYPE']) && $_SESSION['USER_TYPE']=='freelancer') {
  header('Location: projects/projects.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Codify</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="homepage.css">

  </head>

<body>



  <!-- ***** Header Area Start ***** -->
  <header id="page-top" class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            
            <a href="index.php" class="logo">
              <img src="assets/images/logoco.png" height="50px" width="">
              <span class="codify">Codify</span>
            </a>
            
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              
              <li class="scroll-to-section"><a href="#top" class="active"></a></li>
              <li class="scroll-to-section"><a href="#services">Services</a></li>
              <li class="scroll-to-section"><a href="#about">Pourquoi Codify</a></li>
              <li class="scroll-to-section"><a href="login.php">Connexion / M'inscrire</a></li>
              <li class="scroll-to-section"><div class="main-red-button-hover"><a href="signup.php">Déposer Mission</a></div></li>
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <section class="hero bg-light text-center">
    <div class="container">
      <h1 class="display-4">Bienvenue sur Codify</h1>
      <p class="lead">Plateforme de collaboration entre le département de génie civil et ses partenaires socio-économiques.</p>
      <a href="signup.php" class="btn btn-primary">Déposer une mission</a>
    </div>
  </section>

  <div id="services" class="our-services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Explorer nos <em>Différentes et Multiples</em> <span>catégories</span></h2> <br>
            <span>Nos Catégories</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-services">
            <div class="item">
              <h4>Conception des Structures</h4>
              <div class="icon"><img src="assets/images/ecom.png" alt=""></div>
              <p>ETABS, SAP2000, Robot Structural Analysis...</p>
            </div>
            <div class="item">
              <h4>Géotechnique</h4>
              <div class="icon"><img src="assets/images/graph.png" alt=""></div>
              <p>Etudes de sol, fondations profondes, talus</p>
            </div>
            <div class="item">
              <h4>Routes et Transport</h4>
              <div class="icon"><img src="assets/images/web3.png" alt=""></div>
              <p>Conception routière, trafic, outils InfraWorks</p>
            </div>
            <div class="item">
              <h4>Hydraulique &amp; Environnement</h4>
              <div class="icon"><img src="assets/images/vid.png" alt=""></div>
              <p>Hydrologie, assainissement, HEC-RAS</p>
            </div>
            <div class="item">
              <h4>Topographie &amp; BIM</h4>
              <div class="icon"><img src="assets/images/mobile.png" alt=""></div>
              <p>Relevés, modélisation Revit, drones</p>
            </div>
            <div class="item">
              <h4>Gestion de Chantier</h4>
              <div class="icon"><img src="assets/images/seo.png" alt=""></div>
              <p>Planification, sécurité, suivi des coûts</p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="https://images.pexels.com/photos/3194518/pexels-photo-3194518.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Chantier de construction" class="serv">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>  <em>Codify,</em>  <span>Le partenariat,</span>Pourquoi ?</h2>
           
            <div class="row">
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/simple2.png" alt="">
                    </div>
                    <div class="count-digit">Simple</div>
                    
                    <p>Décrivez votre besoin en quelques mots sur la plateforme.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/fast.png" alt="">
                    </div>
                    <div class="count-digit">Rapide</div>
                   
                    <p>Recevez rapidement des propositions de collaboration.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/money2.png" alt="">
                    </div>
                    <div class="count-digit">Gratuit</div>
                    
                    <p>Sélectionnez l'enseignant‑chercheur qui vous convient, sans engagement.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!--
  <div id="subscribe" class="subscribe">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                <h2>Know Your Website SEO Score by Email</h2>
                <form id="subscribe" action="" method="get">
                  <input type="text" name="website" id="website" placeholder="Your Website URL" required="">
                  <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                  <button type="submit" id="form-submit" class="main-button ">Subscribe</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
-->
<!--
  <div id="video" class="our-videos section">
    <div class="videos-left-dec">
      <img src="assets/images/videos-left-dec.png" alt="">
    </div>
    <div class="videos-right-dec">
      <img src="assets/images/videos-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-8">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div style="color: black;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi rerum doloremque voluptas. Iusto in natus sequi soluta odit est quo a sed facere dolor? Voluptatum asperiores quibusdam possimus quod molestias.</div>
                          <div class="overlay-effect">
                            <a href="#"><h4>Project One</h4></a>
                            <span>SEO &amp; Marketing</span>
                          </div>
                          
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <iframe width="100%" height="auto" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          <div class="overlay-effect">
                            <a href="#"><h4>Second Project</h4></a>
                            <span>Advertising &amp; Marketing</span>
                            
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <iframe width="100%" height="auto" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          <div class="overlay-effect">
                            <a href="#"><h4>Project Three</h4></a>
                            <span>Digital &amp; Marketing</span>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <iframe width="100%" height="auto" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          <div class="overlay-effect">
                            <a href="#"><h4>Fourth Project</h4></a>
                            <span>SEO &amp; Advertising</span>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-4">
                  <div class="menu">
                    <div class="active">
                      <div class="thumb">
                        <img src="assets/images/video-thumb-01.png" alt="">
                        <div class="inner-content">
                          <h4>Project One</h4>
                          <span>SEO &amp; Marketing</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="assets/images/video-thumb-02.png" alt="">
                        <div class="inner-content">
                          <h4>Second Project</h4>
                          <span>Advertising &amp; Marketing</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="assets/images/video-thumb-03.png" alt="Marketing">
                        <div class="inner-content">
                          <h4>Project Three</h4>
                          <span>Digital &amp; Marketing</span>
                        </div>
                      </div>
                    </div>
                    <div>
                      <div class="thumb">
                        <img src="assets/images/video-thumb-04.png" alt="SEO Work">
                        <div class="inner-content">
                          <h4>Fourth Project</h4>
                          <span>SEO &amp; Advertising</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
--> <br> <br>
<div class="container2">
  <div class="section-heading" style="text-align: center;">
            <h2>Questions  <em> fréquemment posées </em> <span></span></h2>
            <span>Q&A</span>
          </div> <br> <br> 
  
  <div class="accordion">
    <div class="accordion-item">
      <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">Comment fonctionne la collaboration ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>La collaboration consiste à mettre en relation un partenaire socioéconomique et un enseignant‑chercheur autour d'un projet de génie civil.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Comment choisir le bon enseignant‑chercheur pour mon projet ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Analysez les propositions rȩues et choisissez l'enseignant‑chercheur dont les compétences et les délais correspondent le mieux à vos attentes.
</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">Quel budget ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Avant de publier votre Mission, vous devez absolument lui affecter un Budget.<br>
Le budget doit être suffisamment attractif pour recevoir plusieurs propositions.<br>
Le budget proposé doit aussi correspondre aux attentes des enseignants‑chercheurs.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">Comment bien rédiger mon offre de Mission ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Une Offre de Mission bien rédigée, est une Offre qui reprend tous les détails de la Mission tel un brief de cahier des charges. L'idée est de préciser les 3 idées suivantes:<br>
Le contexte de la mission : présentez votre entreprise, son domaine d'activité et les objectifs du projet.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">Les Recruteurs me contactent depuis ma page de Profil ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Oui, les Recruteurs peuvent vous contacter directement depuis votre page de profil pour vous demander un devis ou vous envoyer un message privé. Il suffit au Recruteur de cliquer sur l'un des deux boutons pour prendre contact avec vous.
</p>
      </div>
    </div>
  </div>
</div>

  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="about footer-item">
            <div class="logo">
              <a href="#"><img src="assets/images/logoco.png" width="30px" alt="Onix Digital TemplateMo">Codify</a>
            </div>
            <a href="#">info@company.com</a>
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="services footer-item">
            <h4>Services</h4>
            <ul>
              <li><a href="#">SEO Development</a></li>
              <li><a href="#">Business Growth</a></li>
              <li><a href="#">Social Media Managment</a></li>
              <li><a href="#">Website Optimization</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="community footer-item">
            <h4>Community</h4>
            <ul>
              <li><a href="#">Digital Marketing</a></li>
              <li><a href="#">Business Ideas</a></li>
              <li><a href="#">Website Checkup</a></li>
              <li><a href="#">Page Speed Test</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="subscribe-newsletters footer-item">
            <h4>Subscribe Newsletters</h4>
            <p>Get our latest news and ideas to your inbox</p>
            <form action="#" method="get">
              <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
              <button type="submit" id="form-submit" class="main-button "><i class="fa fa-paper-plane-o"></i></button>
            </form>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright">
            <p>Copyright © 2022 Hamza El Yesri / L'Hassan Tkarkib. All Rights Reserved. 
            <br>
            
            
          </div>
        </div>
      </div>
    </div>
  </footer>
 

  <!-- Scripts -->
  <script src="assets/js/accordion.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
  // Acc
    $(document).on("click", ".naccs .menu div", function() {
      var numberIndex = $(this).index();

      if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
    });
  </script>
</body>
</html>
