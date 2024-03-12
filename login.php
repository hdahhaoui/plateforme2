<!DOCTYPE html>
<?php

require 'include/config.php';
require 'include/db.php';

if (isset($_SESSION['USER_ID']) && !empty($_SESSION['USER_ID'])) {
   if ($_SESSION['USER_TYPE']== 'client') {
    header('Location: '.$_SESSION['USER_TYPE'].'.php');
   }else {
    header('Location: PFE/freelancer.php');
   }
    exit;
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="signup.css">
    <title>login</title>
</head>
<body>
    <!-- CONTAINER -->
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row g-0 justify-content-center">
            <!-- TITLE -->
        
            <!-- FORMS -->
            <div class="col-lg-7 mx-0 px-0">
                
              
                <div id="qbox-container">
                <form class="form-material form-horizontal m-t-40" id="loginForm" action="include/check-user.php" method="post">
                    <h1 class="title">S'indentifier</h1>
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
                                        <label class="form-check-label question__label" for="free">Freelancer</label>
                                    </div>
                                    <div class="q-box__question">
                                        <input checked class="form-check-input question__input" id="cli" name="usertype" type="radio" value="client" > 
                                        <label class="form-check-label question__label" for="cli">Client / Employeur </label>
                                    </div>
                                </div>

                                <br>
                                 <a href="signup.php"><p>Pas encore inscrit ?</p></a>
                            </div>
                            <div class="step">
                                <br> <br> 
                                
                                <div class="form-check ps-0 q-box">
                                    <div class="q-box__question">
                                        <label for="">Adresse E-mail :</label> <br>
                                        <input type="email" name="email" id="email"> 
                                    </div> <br> <br>
                                    <div class="q-box__question">
                                       <label for="">Mot de passe :</label> <br>
                                        <input type="password" name="password" id="">
                                    </div> <br>
                                    
                                </div>
                                <a href=""><p>Mot de passe oublié  ?</p></a>
                               
                            </div>
                            
                           
                        </div>
                        <div id="q-box__buttons">
                            <button id="prev-btn" type="button">Previous</button> 
                            <button id="next-btn" type="button" onclick="idk()">Suivant</button> 
                            <button id="submit-btn" type="submit" name="submit" value="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- second side-->
            <div class="col-lg-5 offset-lg-1 mx-0 px-0">
                <div id="title-container">
                <a href="index.php"><img class="covid-image" src="assets/images/logoco.png"></a>
                    <h2>Codify</h2>
                    <h3>Plateforme de Freelance</h3>
                    <div style="font-size: 24px;">Tout ce que vous faites sur Codify est lié à votre compte.</div>
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
        }
        else if(client.checked){
            document.getElementById('freelancer').style.display="none";
            document.getElementById('client').style.display="block";
            document.getElementById('idcli').style.display="block";
            document.getElementById('idfree').style.display="none"
        }}
    </script>
    <script src="login.js"></script>
</body>
</html>