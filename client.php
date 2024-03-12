
<!DOCTYPE html>
<?php

require 'include/config.php';
require 'include/db.php';

if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'client') {
    header('Location: login.php');
    exit;
}

$cid = $_SESSION['USER_ID'];
?>
 <?php 
  if(!isset($_SESSION['unique_id'])){
    header("location: post.php");
  }
?>
<?php $resultss = $mysqli->query("SELECT * FROM `client` WHERE `cid` = $cid");
            $rowss = $resultss->fetch_assoc()?>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Client</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="client/assets/css/fontawesome.css">
    <link rel="stylesheet" href="client/assets/css/templatemo-onix-digital.css">
    <link rel="stylesheet" href="client/assets/css/animated.css">
    <link rel="stylesheet" href="client/assets/css/owl.css">
<style>
  label {
    display: inline-block;
    margin-bottom: 0rem; 
}
</style>
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
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!--  Logo Start  -->

            <a href="index.php" class="logo">
              <img src="assets/images/logoco.png" height="50px" width="">
              <span class="codify">Codify</span>
            </a>
            <?php $result8 = $mysqli->query("SELECT * FROM `mssgusers` WHERE `cid` = $cid");
$row8 = $result8->fetch_assoc();?>
            <!--  Logo End  -->
            <!--  Menu Start  -->
            <ul class="nav">

              <li class="scroll-to-section"><a href="#top" class="active"></a></li>
<li class="scroll-to-section">      <img class="user-profile" src="php/images/<?php echo $row8['img']?>" alt=""></li>
              <li class="scroll-to-section"><a href="#video"></a></li> 
              <li class="scroll-to-section"><a href="#contact"><?php echo $rowss['name'] ?></a></li> 
              <li class="scroll-to-section"><div class="main-red-button-hover"><a href="include/logout.php">Logout</a></div></li> 
            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!--  Menu End  -->
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


                <div class="item header-text">

                  <h2>Dashboard <br><em>Client</em></h2> <br> <br>
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#services">Voir Missions </a>
                    </div>

                  </div>
                  
                  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <button style="padding: 12px 25px;
  border-radius: 23px;" class="trigger" data-modal-trigger="trigger-1"><i class="fa fa-fire" aria-hidden="true"></i>Ajouter Mission</button>
                    </div>

                  </div>
                  


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="modal" data-modal="trigger-1">
    <article class="content-wrapper"><button class="close"></button>
        <div class="modal-header">
            <h2>Proposer un nouveau projet</h2>
        </div>
        <form  action="include/add-post.php" method="post" novalidate enctype="multipart/form-data">
        <div class="content">
        
        <label for="" style="padding:20px">Choisissez un nom pour votre projet</label> 
      <input type="text" id="name" name="name" placeholder="Nom du projet" class="dial"> 
      <label for=""style="padding:20px">Choisissez le type de service de votre projet</label>  
      <select id="prjtype" name="prjtype" placeholder="Service Ciblé" class="dial">
          <option value="" selected></option>
          <option value="Developpement Web">Developpement Web</option>
                                            <option value="Design Graphique">Design Graphique</option>
                                            <option value="Developpement Mobile">Developpement Mobile</option>
                                            <option value="Video & Animation">Video & Animation</option>
                                            <option value="Marketing et Vente">Marketing et Vente</option>
                                            <option value="E-Commerce , CMS et ERP">E-Commerce , CMS et ERP</option>
                                         </select>
      <label for=""style="padding:20px">Décrivez votre projet</label> 
      <textarea id="about" name="about" cols="30" rows="3" placeholder="Description du projet" class="dial"></textarea>
      <label for=""style="padding:20px">Quel est votre Budget ?</label>
      <input type="number" id="cost" name="cost" placeholder="Cout estimable du projet" class="dial">
        </div>
        <footer class="modal-footer"><button type="submit" class="action">Post Project</button></footer>
        </form>
    </article>
</div>

      	
      
      
    
<

  

  <!-- <div id="about" class="about-us section">
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
  </div> -->
  <br> <br> <br>
  <?php
            $result = $mysqli->query("SELECT * FROM `post_prj` WHERE `cid` = $cid");
            $num_prj = $result->num_rows;
            ?>
            
  <div id="services" class="containertable">
    
    <ul class="responsive-table">
      <li class="table-header">
        <div class="col col-1">Nom </div>
        <div class="col col-2">Type</div>
        <div class="col col-3">Budget</div>
        <div class="col col-4">Requêtes</div>
        <div class="col col-5">Statut</div>
        <div class="col col-6">Duration</div>
        <div class="col col-7">Actions</div>
      </li>
     
      <?php
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
        <li class="table-row">
        <div style="    max-width: 15.333333%" class="col col-1" data-label="Job Id">
                                                        <?=ucfirst($row['name'])?>
                                                    </div>
        <div class="col col-2" data-label="Customer Name"><?=$row['category']?> </div>
        <div class="col col-3" data-label="Amount"><?=$row['cost']?> $</div>
        <?php
                                                $res = $mysqli->query("SELECT `rid` FROM `post_req` WHERE `pid` = {$row['pid']}"); ?>
        <div class="col col-4" data-label="Payment Status"><?=$res->num_rows?></div>
        <div class="col col-5" data-label="Payment Status"><?=empty($row['status']) ? 'pending' : $row['status']?></div>
        <?php if (empty($row['duration'])) {
        ?>
<div class="col col-6" data-label="Payment Status"><?=$row['duration']?> </div>
        <?php
        }else {
          ?>

<div class="col col-6" data-label="Payment Status"><?=$row['duration']?> jours</div>
          <?php
        }?>
        
        <div style="    max-width: 33.333333%;    flex-basis: 29%;" class="col col-7" data-label="Payment Status"><div class="btns">
        <a target="_blank" style="text-decoration:none ;" href="projects.php?pid=<?=$row['pid']?>&fid=<?=$row['fid']?>"  data-toggle="tooltip" data-original-title="Show request"><button class="act req">  
          toutes les requêtes
                                                    </button></a>
           <a target="_blank" href="post.php?pid=<?=$row['pid']?>" data-toggle="tooltip" data-original-title="Delete">
           <button class="act ed"> modifier</button>
                                                    </a>
          <a href="include/delete-post.php?pid=<?=$row['pid']?>" data-toggle="tooltip" data-original-title="Delete">
          <button class="act del"> Supprimer</button></a></div></div>
      </li>
      <?php
                                        }
                                        ?>
    </ul>
  </div>
 
  

  <!-- <div id="subscribe" class="subscribe">
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
  </div> -->

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
<script>
    const buttons = document.querySelectorAll('.trigger[data-modal-trigger]');

for(let button of buttons) {
	modalEvent(button);
}

function modalEvent(button) {
	button.addEventListener('click', () => {
		const trigger = button.getAttribute('data-modal-trigger');
		// console.log('trigger', trigger)
		const modal = document.querySelector(`[data-modal=${trigger}]`);
		// console.log('modal', modal)
		const contentWrapper = modal.querySelector('.content-wrapper');
		const close = modal.querySelector('.close');

		close.addEventListener('click', () => modal.classList.remove('open'));
		modal.addEventListener('click', () => modal.classList.remove('open'));
		contentWrapper.addEventListener('click', (e) => e.stopPropagation());

		modal.classList.toggle('open');
	});
}

</script>

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