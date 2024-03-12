<?php

require 'include/config.php';
require 'include/db.php';

if (isset($_SESSION['USER_TYPE']) && $_SESSION['USER_TYPE']=='client') {
  header('Location: client.php');
  exit;
}
if (isset($_SESSION['USER_TYPE']) && $_SESSION['USER_TYPE']=='freelancer') {
  header('Location: PFE/freelancer.php');
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

  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

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
              <li class="scroll-to-section"><a href="#about">Tarifs</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Informations</a></li>
              <li class="scroll-to-section"><a href="#video"></a></li> 
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

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="owl-carousel owl-banner " style="width:572px ; ">
                <div class="item header-text">
                  <h6>Pour nos Clients</h6>
                  <h2>Trouvez le <em>Freelance</em> pour vos <span> Missions</span></h2>
                  <p>Codify est une plateforme de mise en relation des freelancers et des clients , inscrivez vous publier vos projets et trouvez vos freelancers.</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#contact">Message Us Now</a>
                    </div>
                    
                  </div>
                </div>
                <div class="item header-text">
                  <h6>Pour nos Talents</h6>
                  <h2>Trouvez <em>grand travail</em>  <span>Rapidement</span></h2>
                  <p>Codify est une plateforme de mise en relation des freelancers et des clients , inscrivez vous pour trouvez vos clients dans votre domaine d'expertise.</p>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#services">Our Services</a>
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

  <div id="services" class="our-services section">
    <div class="services-right-dec">
      <img src="assets/images/services-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="services-left-dec">
        <img src="assets/images/services-left-dec.png" alt="">
      </div>
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
              <h4>E-Commerce , CMS , ERP</h4>
              <div class="icon"><img src="assets/images/ecom.png" alt=""></div>
              <p>Prestashop , Wordpress ,  Drupal , Joomla  SAP , Woocommerce</p>
            </div>
            <div class="item">
              <h4>Design Graphique</h4>
              <div class="icon"><img src="assets/images/graph.png" alt=""></div>
              <p>Design de Logos , Illustrations , Web Design</p>
            </div>
            <div class="item">
              <h4>Développement Web</h4>
              <div class="icon"><img src="assets/images/web3.png" alt=""></div>
              <p>PHP , .Net , Javascript , Python , Java , Laravel , React , Angular ...</p>
            </div>
            <div class="item">
              <h4>Video & Animation</h4>
              <div class="icon"><img src="assets/images/vid.png" alt=""></div>
              <p>Animations 2D , 3D , Montage , Réalisation de Vidéos </p>
            </div>
            <div class="item">
              <h4>Développement Mobile</h4>
              <div class="icon"><img src="assets/images/mobile.png" alt=""></div>
              <p>React Native , Android Studio , Swift</p>
            </div>
            <div class="item">
              <h4>Marketing et Vente</h4>
              <div class="icon"><img src="assets/images/seo.png" alt=""></div>
              <p>Stratégie Marketing , SEO , SEA ,  Google ADS , Social Media ,...</p>
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
            <img src="https://images.pexels.com/photos/3194518/pexels-photo-3194518.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="Two freelancers working together" class="serv">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>  <em>Codify,</em>  <span>Le freelancing,</span>Pourquoi ?</h2>
           
            <div class="row">
              <div class="col-lg-4">
                <div class="fact-item">
                  <div class="count-area-content">
                    <div class="icon">
                      <img src="assets/images/simple2.png" alt="">
                    </div>
                    <div class="count-digit">Simple</div>
                    
                    <p>Décrivez votre projet en quelques mots sur la plateforme .</p>
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
                   
                    <p>Recevez une dizaine de devis en quelques minutes.</p>
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
                    
                    <p>Choisissez votre freelance idéal , sans obligation.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="portfolio" class="our-portfolio section">
    <div class="portfolio-left-dec">
      <img src="assets/images/portfolio-left-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Les Services  <em>professionnels</em> <span>populaires</span></h2> <br>
            <span>Nos Services</span>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-portfolio">
            
            <div class="item">
              <div class="thumb">
                <img src="https://images.pexels.com/photos/2102416/pexels-photo-2102416.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                   
                    <span>Concevez votre site Web</span>
                    <a href="#"><h4>Wordpress</h4></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="https://images.pexels.com/photos/6177612/pexels-photo-6177612.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    
                    <span>construisez votre marque </span>
                    <a href=""><h4>Design de Logo</h4></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="https://images.pexels.com/photos/5632382/pexels-photo-5632382.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940 alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                   
                    <span>construisez votre marque</span>
                     <a href="#"><h4>E-commerce</h4></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="https://images.pexels.com/photos/6476808/pexels-photo-6476808.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <span>Atteignez plus de clients</span>
                    <a href="#"><h4>SEO</h4></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="https://images.pexels.com/photos/821749/pexels-photo-821749.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    <span>Partager vos Illustrations</span>
                    <a href="#"><h4>Photographie</h4></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="thumb">
                <img src="https://images.pexels.com/photos/3585088/pexels-photo-3585088.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
                <div class="hover-effect">
                  <div class="inner-content">
                    
                    <span>Concrétiser vos idées</span>
                    <a href="#"><h4>Application Mobile</h4></a>

                  </div>
                </div>
              </div>
            </div>
            
            
           
            
           
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="pricing" class="pricing-tables">
    <div class="tables-left-dec">
      <img src="assets/images/tables-left-dec.png" alt="">
    </div>
    <div class="tables-right-dec">
      <img src="assets/images/tables-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading">
            <h2>Tarification <br>  <em>      facile</em> et<span> accessible</span></h2>
            <span>Tarifs pour freelancers</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="item first-item">
            <h4>Plan Starter</h4>
            <em>390 DH</em> <br>
            <span>199DH</span> <br>
            <p>Votre essentiel pour bien démarrer </p>
            <ul>
              <li>Durée : 15 jours</li>
              <li>20 Projets</li>
              <li></li>
              <br> <br> 
            </ul>
            <div class="main-blue-button-hover">
              <a href="#">Commencez</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item second-item">
            <h4>Plan Standard</h4>
            <em>400 DH</em>  <br>
            <span>299 DH</span> <br>
            <p>Remportez des missions facilement  </p>
            <ul>
              <li>Durée : 6 mois</li>
              <li>50 Projets</li>
              <li>Badge Pro</li>
             
            </ul>
            <div class="main-blue-button-hover">
              <a href="#">obtenez le</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="item third-item">
            <h4>Plan Expert</h4>
            <em>560 DH</em> <br>
            <span>390 DH</span> <br>
            <p>Augmentez vos bénéfices rapidement</p>
            <ul>
              <li>Durée illimitée</li>
              <li>Projets illimités</li>
              <li>Badge expert</li>
              
            </ul>
            <div class="main-blue-button-hover">
              <a href="#">Acheter maintenant              </a>
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
      <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title">Comment ca marche le freelance ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Le freelance est un travailleur indépendant qui s'occupe de gérer seul son activité : il n'a ni employé, ni patron, mais il peut se tourner vers des prestataires externes pour déléguer certaines tâches, comme c'est souvent le cas avec la comptabilité par exemple. Être freelance n'est pas un statut juridique en soi.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">Comment choisir le bon Freelancer pour ma Mission ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Commencez tout d'abord par visualiser les devis reçus au niveau de votre Offre de Mission. Comparez les prix demandé par chaque Freelancer ainsi que le temps demandé pour avoir une idée sur la qualité et le respect des modalités de la prestation à fournir.
</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">Quel budget ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Avant de publier votre Mission, vous devez absolument lui affecter un Budget.<br>
Le Budget doit être intéressant pour attirer un nombre important de Freelancers qui vous proposeront des tarifs dans les l'interval du budget proposé.<br>
Le Budget proposé doit également répondre à la rémunération psychologiquement attendu par les Freelancers.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title">Comment bien rédiger mon offre de Mission ?</span><span class="icon" aria-hidden="true"></span></button>
      <div class="accordion-content">
        <p>Une Offre de Mission bien rédigée, est une Offre qui reprend tous les détails de la Mission tel un brief de cahier des charges. L'idée est de préciser les 3 idées suivantes:<br>
Le Contexte de la Mission: Présenter aux Freelancers votre entreprise, son secteur d'activité et le pourquoi de la Mission.</p>
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

  <div class="footer-dec">
    <img src="assets/images/footer-dec.png" alt="">
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