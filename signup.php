<?php

require 'include/config.php';
require 'include/db.php';

if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])) {
    header('Location: '.$_SESSION['USER_TYPE'].'.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <title>Signup</title>
</head>
<body>
    <!-- CONTAINER -->
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row g-0 justify-content-center">
            <!-- TITLE -->
            <div class="col-lg-5 offset-lg-1 mx-0 px-0">
                <div id="title-container">
                    <a href="index.php" class="logo-login" title="Revenir à l'accueil">
                        <img src="img/logo-celutgc.png" alt="Logo CELUT-GC" class="covid-image">
                    </a>
                    <h2>CELUT-GC</h2>
                    <h3>Espace de collaboration dans le domaine de Génie Civil</h3>
                    <div style="font-size:30px ;">Inscrivez-vous pour continuer</div>
                </div>
            </div>
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
                <div class="progress">
                    <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%"></div>
                </div>
              
                <div id="qbox-container">
                    
                <form class="form-material form-horizontal m-t-40 needs-validation" id="signupForm" action="include/add-user.php" method="POST" novalidate enctype="multipart/form-data" autocomplete="off">
                    <?php
                        if (!isset($_SESSION['msg']) || $_SESSION['msg'] == '') {
                        } else {
                            ?>
				        <div class="alert alert-<?=$_SESSION['msg']['type']?> alert-dismissable">
					       
					        <?=$_SESSION['msg']['msg']?>
				        </div>
                        <?php
                            $_SESSION['msg'] = '';
                            unset($_SESSION['msg']);
                        }
                        ?>
                        <div id="steps-container">
                            <div class="step">
                                <br> <br> <br> <br>
                                <h4>Veuillez selectionner votre type d'utilisateur</h4>
                                <div class="form-check ps-0 q-box" >
                                    <div class="q-box__question">
                                        <input class="form-check-input question__input" id="free" name="usertype" type="radio" value="freelancer" > 
                                        <label class="form-check-label question__label" for="free">Enseignant-Chercheur</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input checked class="form-check-input question__input" id="cli" name="usertype" type="radio" value="client" > 
                                        <label class="form-check-label question__label" for="cli">Partenaire socioéconomique</label>
                                    </div>
                                </div>
                            </div>
                            <div class="step">
                               <br> <br>
                                <div class="mt-1">
                                    <label class="form-label" id="nameLabel">Nom Complet :</label>
                                    <input class="form-control" id="name" name="name" type="text" required>
                                </div>
                                
                                <div class="mt-2">
                                    <label class="form-label">Adresse E-mail:</label> 
                                    <input class="form-control" id="email" name="email" type="email" required>
                                </div>
                            
                                <div class="mt-2">
                                    <label class="form-label">Mot de Passe :</label> 
                                    <input class="form-control" id="password" name="password" required value="" type="password" style="width: 100%" >
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Confirmation du Mot de Passe :</label> 
                                    <input class="form-control" id="cpassword" name="cpassword"  required value="" type="password" style="width: 100%">
                                </div>
                                <label class="" id="imageLabel" for="profileimage">Photo d'identité</label> <br>
                                    <input type="file" id="image" name="image" class="form-control form-control-line" required accept="image/x-png,image/gif,image/jpeg,image/jpg"> <br> <br> <br>
                                   
                                <div class="row mt-2">
                                    <div class="col-lg-2 col-md-2 col-3">
                                        
                                    </div>
                                    <div class="col-lg-8">
                                        
                                    </div>
                                </div>
                            </div>
                            
                           
                            <div class="step">
                            <div id="freelancer">
                                
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                        <!-- <input class="form-check-input question__input" id="q_2_yes" name="q_2" type="radio" value="Yes"> 
                                        <label class="form-check-label question__label" for="q_2_yes">Yes</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input checked class="form-check-input question__input" id="q_2_no" name="q_2" type="radio" value="No"> 
                                        <label class="form-check-label question__label" for="q_2_no">No</label> -->
                                    <br><br> <br><label for="">Domaine d'expértise:</label> <br>
                                    <select name="domaine" id="" required>
                                        <option value="Structures">Structures</option>
                                        <option value="Géotechnique">Géotechnique</option>
                                        <option value="Hydraulique">Hydraulique</option>
                                        <option value="Transport">Transport</option>
                                        <option value="Environnement">Environnement</option>
                                    </select> <br> <br> <br>

                                   
                                    <label for="">CV</label> <br>
                                    <input type="file" id="cv" name="cv" class="form-control form-control-line" required> <br> <br> <br>
                                    
                                    <label for="">CIN</label> <br>
                                    <input type="file" id="id" name="id" class="form-control form-control-line" required> <br> <br>
                                    <label for="">Attestation de travail</label> <br>
                                    <input type="file" id="attestation" name="attestation" class="form-control form-control-line" required> <br> <br>
                                    </div>
                                </div>
                                </div>
                                <div id="client" style=""> 
                                <!-- client -->
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                    <br><br> <br>                                      
                                    </div> <br> <br>
                                    <div class="q-box__question">
                                         <label class="" for="sec">Secteur d'activité :</label> <br>
                                        <input required class="" id="sec" name="sec" type="text"> 
                                        
                                    </div> <br> <br>
                                    <div class="q-box__question">
                                         <label class="" for="sec">Service ciblé :</label> 
                                         <select required class="" id="serv" name="serv">
                                            <option value="Structures">Structures</option>
                                            <option value="Géotechnique">Géotechnique</option>
                                            <option value="Transport">Transport</option>
                                            <option value="Hydraulique">Hydraulique</option>
                                            <option value="Environnement">Environnement</option>
                                         </select>
                                         <br>

                                     </div> <br> <br>
                                     <div class="q-box__question">
                                         <label class="" for="address">Adresse :</label> <br>
                                         <input required class="" id="address" name="address" type="text">
                                     </div> <br> <br>
                                     <div class="q-box__question">
                                         <label class="" for="phone">Numéro de téléphone :</label> <br>
                                         <input required class="" id="phone" name="phone" type="text">
                                     </div>
                                     </div>
                                 </div>
                                 </div>
                            
                        </div>
                        <div class="g-recaptcha mb-3" data-sitekey="<?= $recaptchaSiteKey ?>"></div>
                        <div id="q-box__buttons">
                            <button id="prev-btn" type="button">Previous</button> 
                            <button id="next-btn" type="button" onclick="idk()">Suivant</button>
                            <button id="submit-btn" type="submit" name="submit" value="submit">submit</button>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- PRELOADER -->
    <div id="preloader-wrapper">
        <div id="preloader"></div>
        <div class="preloader-section section-left"></div>
        <div class="preloader-section section-right"></div>
    </div>
    <script>
        function idk()
        {var free = document.getElementById('free');
        var client=document.getElementById('cli');
        if(free.checked){
                document.getElementById('freelancer').style.display="block";
                document.getElementById('client').style.display="none";
                document.getElementById('idcli').style.display="none";
                document.getElementById('idfree').style.display="block"
                document.getElementById('nameLabel').innerText = 'Nom Complet :';
                document.getElementById('imageLabel').innerText = "Photo d'identité";
        }
        else if(client.checked){
            document.getElementById('freelancer').style.display="none";
            document.getElementById('client').style.display="block";
            document.getElementById('idcli').style.display="block";
            document.getElementById('idfree').style.display="none"
            document.getElementById('nameLabel').innerText = "Nom de l'entreprise :";
            document.getElementById('imageLabel').innerText = "Logo de l'entreprise";
        }}
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="signup.js"></script>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <span>© 2025 CELUT-GC. Tous droits réservés.</span>
            <div class="footer-social">
                <a href="https://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook"></i></a>
                <a href="https://www.linkedin.com/" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
