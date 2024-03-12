<!DOCTYPE html>
<?php


use function Composer\Autoload\includeFile;

require 'include/config.php';
require 'include/db.php';

if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header('Location: login.php');
    exit;
}
if (!isset($_SESSION['USER_TYPE']) || ($_SESSION['USER_TYPE'] != 'freelancer' && $_SESSION['USER_TYPE'] != 'client')) {
    header('Location: login.php');
    exit;
}

$uid = $_SESSION['USER_ID'];

$pid = (int) @$_GET['pid'];
$result = $mysqli->query("SELECT `pid`, `name`, `detail`, `cost`, `fid` FROM `post_prj` WHERE `pid` = $pid");
if (!$result->num_rows) {
    exit('No project found.');
}
$row = $result->fetch_assoc();
?>
<html lang="en">

<head>
    
    <meta charset="utf-8">
	<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Projects - Codify</title>

	<link href="<?=$favicon?>" rel="shortcut icon">
	<link href="<?=$favicon?>" rel="icon" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- page css -->
    <link href="asset/dist/css/pages/login-register-lock.css" rel="stylesheet">
    
    <!-- page css -->
    <link href="asset/dist/css/pages/file-upload.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="asset/css/stylish-portfolio.min.css" rel="stylesheet">
    <style>
    .help {
        font-size: 16px
    }
    .navbar-brand {
        font-size: 24px;
        text-shadow: 1px 1px 2px #FFFFFF, 0 0 1em #005500, 0 0 0.2em blue;
    }
    .nav-link {
        font-size: 20px;
        text-shadow: 1px 1px 2px #FFFFFF, 0 0 1em #005500, 0 0 0.2em blue;
    }
    .btn-rounded{border-radius:60px;padding:7px 18px}.btn-group-lg>.btn-rounded.btn,.btn-rounded.btn-lg{padding:.75rem 1.5rem}.btn-group-sm>.btn-rounded.btn,.btn-rounded.btn-sm{padding:.25rem .5rem;font-size:12px}.btn-rounded.btn-xs{padding:.25rem .5rem;font-size:10px}.btn-rounded.btn-md{padding:12px 35px;font-size:16px}
    .form-material .form-group{overflow:hidden}.form-material .form-control{background-color:rgba(0, 0, 0, 0);background-position:center bottom, center calc(100% - 1px);background-repeat:no-repeat;background-size:0 2px, 100% 1px;padding:0;-webkit-transition:background 0s ease-out 0s;-o-transition:background 0s ease-out 0s;transition:background 0s ease-out 0s}.form-material .form-control,.form-material .form-control.focus,.form-material .form-control:focus{background-image:-webkit-gradient(linear, left top, left bottom, from(#fb9678), to(#fb9678)), -webkit-gradient(linear, left top, left bottom, from(#e9ecef), to(#e9ecef));background-image:-webkit-linear-gradient(#fb9678, #fb9678), -webkit-linear-gradient(#e9ecef, #e9ecef);background-image:-o-linear-gradient(#fb9678, #fb9678), -o-linear-gradient(#e9ecef, #e9ecef);background-image:linear-gradient(#fb9678, #fb9678), linear-gradient(#e9ecef, #e9ecef);border:0 none;border-radius:0;-webkit-box-shadow:none;box-shadow:none;float:none}.form-material .form-control.focus,.form-material .form-control:focus{background-size:100% 2px, 100% 1px;outline:0 none;-webkit-transition-duration:0.3s;-o-transition-duration:0.3s;transition-duration:0.3s}
    .form-control-line .form-group {
        overflow:hidden
    }
    .form-control-line .form-control {
        border:0px;
        border-radius:0px;
        padding-left:0px;
        border-bottom:1px solid #e9ecef
    }
    .form-control-line .form-control:focus {
        border-bottom:1px solid #fb9678
    }
    .ryu{
        position: relative;
        left: 83%;
        padding: 7.4px 10px;
    }
    .ryu1{
        width: 15%;
        position: absolute;
        bottom:91.3%;
        left:80%;
        background-color: black;
        border-color: black;
        height: 8.8%;
        
    }
    .container.text-center {
    margin-top: 87px;
}
    .ryu1:hover{ 
        background-color: white;
        color:black;
        border-color: white;
    }
    .ryu2{
        width: 15%;
        bottom:85.2%;
        left:80%;
        height: 14.9%;
    }
    .ryu3{
        width: 15%;
        bottom:90.2%;
        left:80%;
        height: 9.8%;
    }
    .ryu4{
        width: 15%;
        bottom:86.9%;
        left:80%;
        height: 13.2%;
    }
    </style>
    <style>
    .card{position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:0px solid transparent;border-radius:67px}.card>hr{margin-right:0;margin-left:0}.card>.list-group:first-child .list-group-item:first-child{border-top-left-radius:0px;border-top-right-radius:0px}.card>.list-group:last-child .list-group-item:last-child{border-bottom-right-radius:0px;border-bottom-left-radius:0px}.card-body{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;padding:1.25rem}.card-title{margin-bottom:0.75rem}.card-subtitle{margin-top:-0.375rem;margin-bottom:0}.card-text:last-child{margin-bottom:0}.card-link:hover{text-decoration:none}.card-link+.card-link{margin-left:1.25rem}.card-header{padding:0.75rem 1.25rem;margin-bottom:0;background-color:rgba(0, 0, 0, 0.03);border-bottom:0px solid transparent}.card-header:first-child{border-radius:calc(81px - 0px) calc(81px - 0px) 0 0}.card-header+.list-group .list-group-item:first-child{border-top:0}.card-footer{padding:0.75rem 1.25rem;background-color:rgba(0, 0, 0, 0.03);border-top:0px solid transparent}.card-footer:last-child{border-radius:0 0 calc(0px - 0px) calc(0px - 0px)}.card-header-tabs{margin-right:-0.625rem;margin-bottom:-0.75rem;margin-left:-0.625rem;border-bottom:0}.card-header-pills{margin-right:-0.625rem;margin-left:-0.625rem}.card-img-overlay{position:absolute;top:0;right:0;bottom:0;left:0;padding:1.25rem}.card-img{width:100%;border-radius:calc(0px - 0px)}.card-img-top{width:100%;border-top-left-radius:calc(0px - 0px);border-top-right-radius:calc(0px - 0px)}.card-img-bottom{width:100%;border-bottom-right-radius:calc(0px - 0px);border-bottom-left-radius:calc(0px - 0px)}.card-deck{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.card-deck .card{margin-bottom:10px}@media (min-width:576px){.card-deck{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-flow:row wrap;flex-flow:row wrap;margin-right:-10px;margin-left:-10px}.card-deck .card{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-flex:1;-ms-flex:1 0 0%;flex:1 0 0%;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;margin-right:10px;margin-bottom:0;margin-left:10px}}.card-group{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column}.card-group>.card{margin-bottom:10px}@media (min-width:576px){.card-group{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-flow:row wrap;flex-flow:row wrap}.card-group>.card{-webkit-box-flex:1;-ms-flex:1 0 0%;flex:1 0 0%;margin-bottom:0}.card-group>.card+.card{margin-left:0;border-left:0}.card-group>.card:first-child{border-top-right-radius:0;border-bottom-right-radius:0}.card-group>.card:first-child .card-header,.card-group>.card:first-child .card-img-top{border-top-right-radius:0}.card-group>.card:first-child .card-footer,.card-group>.card:first-child .card-img-bottom{border-bottom-right-radius:0}.card-group>.card:last-child{border-top-left-radius:0;border-bottom-left-radius:0}.card-group>.card:last-child .card-header,.card-group>.card:last-child .card-img-top{border-top-left-radius:0}.card-group>.card:last-child .card-footer,.card-group>.card:last-child .card-img-bottom{border-bottom-left-radius:0}.card-group>.card:only-child{border-radius:0px}.card-group>.card:only-child .card-header,.card-group>.card:only-child .card-img-top{border-top-left-radius:0px;border-top-right-radius:0px}.card-group>.card:only-child .card-footer,.card-group>.card:only-child .card-img-bottom{border-bottom-right-radius:0px;border-bottom-left-radius:0px}.card-group>.card:not(:first-child):not(:last-child):not(:only-child){border-radius:0}.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-footer,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-header,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,.card-group>.card:not(:first-child):not(:last-child):not(:only-child) .card-img-top{border-radius:0}}.card-columns .card{margin-bottom:0.75rem}@media (min-width:576px){.card-columns{-webkit-column-count:3;column-count:3;-webkit-column-gap:1.25rem;column-gap:1.25rem;orphans:1;widows:1}.card-columns .card{display:inline-block;width:100%}}.accordion .card:not(:first-of-type):not(:last-of-type){border-bottom:0;border-radius:0}.accordion .card:not(:first-of-type) .card-header:first-child{border-radius:0}.accordion .card:first-of-type{border-bottom:0;border-bottom-right-radius:0;border-bottom-left-radius:0}.accordion .card:last-of-type{border-top-left-radius:0;border-top-right-radius:0}

    </style>
    <style>
    .card{margin-bottom:20px;-webkit-box-shadow:0 1px 4px 0 rgba(0, 0, 0, 0.1);box-shadow:0 1px 4px 0 rgba(0, 0, 0, 0.1)}.card .card-subtitle{font-weight:300;margin-bottom:15px;color:#6c757d}.card .card-title{position:relative;font-weight:500}.card .card-actions{float:right}.card .card-actions a{padding:0 5px;cursor:pointer}.card-group{margin-bottom:20px}.card-group .card{border-right:1px solid #e9ecef}.card-fullscreen{position:fixed;top:0px;left:0px;width:100%;height:100%;z-index:9999;overflow:auto}
    </style>
    <style>
        .card.border-info {
    border-radius: 0px;
}
    .border-primary{border-color:#fb9678!important}.border-secondary{border-color:#f8f9fa!important}.border-success{border-color:#00c292!important}.border-info{border-color:#03a9f3!important}.border-warning{border-color:#fec107!important}.border-danger{border-color:#e46a76!important}.border-light{border-color:#f8f9fa!important}.border-dark{border-color:#343a40!important}.border-cyan{border-color:#01c0c8!important}.border-purple{border-color:#ab8ce4!important}.border-white{border-color:#fff!important}
    </style>

</head>

<body id="page-top">

    <!-- Header -->
	<?php
    require 'include/header.php';
    ?>

    <header class="masthead">
        <div class="container text-center">
            <!--<h2 class="mx-auto mb-5"></h2>-->
            <div class="sinup-box card border-primary">
                <div class="card-header bg-primary">
                    <h3 class="m-0 text-light"><?=ucfirst($row['name'])?></h3>
                </div>
                <div class="card-body text-left">
                    <div class="form-group">
                        <?php
                        if (!isset($_SESSION['msg']) || $_SESSION['msg'] == '') {
                        } else {
                            ?>
				        <div class="alert alert-<?=$_SESSION['msg']['type']?> alert-dismissable">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					        <?=$_SESSION['msg']['msg']?>
				        </div>
                        <?php
                            $_SESSION['msg'] = '';
                            unset($_SESSION['msg']);
                        }
                        $querys = "SELECT * FROM `post_req` WHERE `pid` = $pid ";
                        $ham = $mysqli->query($querys);
                        $hamm = $ham->fetch_assoc();
                        ?>
                    </div>
                    <h4 class="card-title h5"> Budget de Projet</h4>
                    <p class="card-text"><i class="fa fa-rupee"></i> <?=$row['cost']?></p>
                    <h4 class="card-title h5" >Description de Project </h4>
                    <p class="card-text"name="descriptionInput" id="description" value="<?=ucfirst($row['detail'])?>"><?=ucfirst($row['detail'])?> </p>
                    
                    <!--aji-->
                     
                    <?php
                    if ($_SESSION['USER_TYPE'] == 'freelancer') {
                        $query = "SELECT * FROM `post_req` WHERE `pid` = $pid AND (`fid` = $uid OR `status` = 'Hired')";
                        $res = $mysqli->query($query);
                        $upload = false;
                        if ($res->num_rows) {
                            while ($r = $res->fetch_assoc()) {
                                echo 'Price: '.$r['price'].'<br>'.'Duration: '.$r['duration'];
                                if ($r['fid'] == $uid) {
                                    if ($r['status'] == 'Hired') {
                                        $msg = '<p class="card-text"><span value="Project Completed" class="badge badge-success">Project Awarded</span></p>';
                                        $upload = true;
                                    }
                                    if ($r['status'] == 'completed') {
                                        $msg = '<p class="card-text"><span value="Project Completed" class="badge badge-success badge-successsss">Project Completed</span></p>';
                                        $upload = false;
                                    } else {
                                        $msg = '';
                                    }
                                } elseif ($r['status'] == 'Hired') {
                                    $msg = '<p class="card-text"><span class="badge badge-danger">Request Rejected</span></p>';
                                }
                            }
                            echo $msg;
                            ?>
                            
                            <?php
                            if (!$upload && $mssg='') {
                                ?>
                            
                        <?php
                            }elseif(!$upload && isset($mssg))  { 
                            ?>
                       
                            <?php
                            }
                                ?>
                            <?php
                            if ($upload) {
                                ?>
                             
                    <h4 class="card-title h5">Télécharger le projet terminé</h4>
                    <form class="form-material form-horizontal m-t-40 needs-validation" id="bidForm" action="include/upload.php" method="post" novalidate enctype="multipart/form-data">
                        <input type="hidden" name="pid" value="<?=$row['pid']?>">
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <label for="prj" class="text-info col-form-label">Téléchargez un seul fichier archivé (par exemple, .rar, .zip) contenant l'ensemble du projet.</label>
                                <input type="file" id="prj" name="prj" class="form-control form-control-line" required>
                                <div class="invalid-feedback help text-left">
                                Veuillez télécharger votre projet.
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
            
                                <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" id="uploadBtn">Upload</button>
                            </div>
                        </div>
                    </form>
                            <?php
                            }
                        } else {
                            ?>
                    <form class="form-material form-horizontal m-t-40 needs-validation" id="bidForm" action="include/placebid.php" method="post" novalidate>
                        <input type="hidden" name="pid" value="<?=$row['pid']?>">
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <input type="number" id="price" name="price" class="form-control form-control-line" placeholder="Price" required="" value="">
                                <div class="invalid-feedback help help-block text-left">
                                Veuillez entrer votre prix.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <input type="number" id="duration" name="duration" class="form-control form-control-line" placeholder="durée en jours" required="" value="">
                                <div class="invalid-feedback help help-block text-left">
                                Veuillez entrer votre durée de projet
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <label for="msg" class="text-info col-form-label">Que ce qui vous fait un bon candidat pour ce projet (Motivation)</label>
                                <textarea rows="5" id="msg" name="msg" class="form-control form-control-line form-control-success" placeholder="Your message" required value=""></textarea>
                                <div class="invalid-feedback help text-left">
                                Veuillez entrer votre message
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
                            
                                <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" id="bidBtn">Place Bid</button>
                            </div>
                        </div>
                    </form>
                    <?php
                        }
                    } else {
                        $res = $mysqli->query("SELECT * FROM `post_req` WHERE `pid` = $pid");
                        $rs = $mysqli->query("SELECT * FROM `post_prj` WHERE `pid` = $pid");
                        $rw = $rs->fetch_assoc();
                        if ($rw['status'] == 'completed') {
                            echo '<p class="card-text"><span class="badge badge-success">Project Completed</span></p>';
                            // echo "<a href='$rw[file]' class='btn btn-primary'>Download</a>";
                            ?>
                           <div id="smart-button-container">
                           <div style="text-align: center"><input type="text" name="descriptionInput" id="description" required maxlength="127" placeholder="Ecrivez yes si vous acceptez l'offre" style="    position: absolute;
    left: 2%;
    width: 28%;"></div>
                             <p id="descriptionError" style="visibility: hidden; color:red; text-align: center;">Description de Projet</p>
                             <div style="text-align: left"><h4 class="card-title h5" >Bid proposal</h4><input name="amountInput" type="number" id="amount" readonly style="width: 29%;" value="<?=$hamm['price']?>" ><span> USD</span></div>
                             <p id="priceLabelError" style="visibility: hidden; color:red; text-align: center;">Veuillez entrer un prix</p>
                           <div id="invoiceidDiv" style="text-align: center; display: none;"><label for="invoiceid"> </label><input name="invoiceid" maxlength="127" type="text" id="invoiceid" value="" ></div>
                             <p id="invoiceidError" style="visibility: hidden; color:red; text-align: center;">Please enter an Invoice ID</p>
                           <div style="text-align: center; margin-top: 0.625rem;" id="paypal-button-container"></div>
                         </div><?php


                        } else {
                            ?>
                <form id="acptForm" action="include/accept.php" method="post" novalidate>
                    <input type="hidden" name="pid" value="<?=$row['pid']?>">
            <div class="row">
                <div class="col-12 m-t-30">
                    <p class="text-muted m-t-0"><?=$res->num_rows?> request<?=$res->num_rows > 1 ? 's' : null?></p>
                </div>
                <?php
                while ($r = $res->fetch_assoc()) {
                    ?>
                     <?php  
              $ryukiro = $mysqli->query("SELECT * FROM `mssgusers` WHERE `fid` = {$r['fid']}");
              $ryu = $ryukiro->fetch_assoc();
              
              ?>
                    <!-- aji -->
                <div class="col-md-12">
                    <div class="card border-info">
                        <div class="card-body">
                            <h3 class="card-title">
                            #<?=ucfirst($r['fid'])?> <?=ucfirst($ryu['name'])?> 
                            </h3>
                            <p class="card-text"><?=$r['price']. ' $ '?>, <?=$r['duration'].' jours'?></p>
                            <p class="card-text"><?=ucfirst($r['msg'])?></p>
                            <?php
                            if ($row['fid'] == null || $row['fid'] == 0) {
                                ?>
                            <button class="btn btn-info card-actions" name="fid" value="<?=$r['fid']?>">Accept & Hire</button>
                            <a target="_blank" href="users.php?pid=<?=$row['pid']?>&fid=<?=$r['fid']?>&user_id=<?=$ryu['unique_id']?>" style="background-color: blue; color:#fff;"  class="ryu btn btn-sm" data-toggle="tooltip" data-original-title="chat">
                                            <i class="fa fa-chat"></i> chat
                            </a>
                            <?php
                            } elseif ($r['fid'] == $row['fid']) {
                                ?>
                            <button class="btn btn-info card-actions disabled" disabled name="fid" value="<?=$r['fid']?>">Accepted</button>
                            <a target="_blank" href="chat.php?pid=<?=$row['pid']?>&fid=<?=$r['fid']?>&user_id=<?=$ryu['unique_id']?>" style="background-color: blue; color:#fff;"  class="ryu btn btn-sm" data-toggle="tooltip" data-original-title="chat">
                                            <i class="fa fa-chat"></i> chat
                                            
                            </a>
                            <?php
                            } else {
                                ?>
                            <button class="btn btn-info card-actions disabled" disabled name="fid" value="<?=$r['fid']?>"> refused </button>
                            <a target="_blank" href="users.php?pid=<?=$row['pid']?>&fid=<?=$r['fid']?>&user_id=<?=$ryu['unique_id']?>" style="background-color: blue; color:#fff;"  class="ryu btn btn-sm" data-toggle="tooltip" data-original-title="chat">
                                            <i class="fa fa-chat"></i> chat
                            </a>
                            <?php
                            } ?>
                    </div>
                    </div>
                </div>
                <?php
                } ?>
               
            </div>
                </form>
            <div class="row text-center">
                <div class="col-6 m-t-30 offset-5">
                    <nav aria-label="Page navigation example" class="m-t-40">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0)">1</a>
                            </li>
                            <li class="page-item disabled">
                                <a class="page-link" href="javascript:void(0)">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>

    <!-- Footer -->
	<?php
    require 'include/footer.php';
    ?>
                            
    
    <!-- Scroll to Top Button-->
    <!--
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a> -->

    <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6298d036b0d10b6f3e755e2a/1g4ieqm7i';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>

<!--End of Tawk.to Script-->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="vendor/popper/popper.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="asset/js/stylish-portfolio.min.js"></script>

    <!--Wave Effects -->
    <script src="asset/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="asset/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="asset/dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <script src="asset/dist/js/pages/jasny-bootstrap.js"></script>

    <script src="asset/js/jquery.validate.min.js"></script>
    <script>
		$.validator.setDefaults( {
			submitHandler: function () {
                $('#bidBtn').html('Place Bid <div class="spinner-border text-secondary float-right" role="status"><span class="sr-only">Loading...</span></div>');
                $('#bidBtn').attr('disabled','disabled');
                $('#bidForm').attr('disabled','disabled');
                $('#bidForm').addClass('disabled');
                //$('#msg').attr('disabled','disabled');
                $( "#bidForm" ).submit();
				//$( "#btn" ).html('');
                //alert( "submitted!" );
			}
		} );

		$( document ).ready( function () {
            $( "#bidForm" ).validate( {
				rules: {
					msg: {
						required: true,
						minlength: 30
					}
				},
				messages: {
					msg: {
						required: "Please enter your message",
						minlength: "Your message must consist of at least 30 characters"
					}
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );

					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.parents( ".col-xs-12" ).addClass( "has-feedback" );

					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
					} else {
						error.insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					$( element ).parents( ".col-xs-12" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
				},
				unhighlight: function (element, errorClass, validClass) {
					$( element ).parents( ".col-xs-12" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
				}
			} );
		} );
	</script>
    
    <!-- Custom Theme JavaScript -->
    <script>
    $('#name').focus(function() {
        $('#success').html('');
    });

    $('#usertype').change(function(e) {
        if($('#usertype').val() == 'freelancer') {
            $("#cvInput").show();
            $("#idInput").show();
            $("#langInput").show();
        }
        else {
            $("#cvInput").hide();
            $("#idInput").hide();
            $("#langInput").hide();
        }
    });

    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

    
<script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
  function initPayPalButton() {
    var description = document.querySelector('#smart-button-container #description');
    var amount = document.querySelector('#smart-button-container #amount');
    var descriptionError = document.querySelector('#smart-button-container #descriptionError');
    var priceError = document.querySelector('#smart-button-container #priceLabelError');
    var invoiceid = document.querySelector('#smart-button-container #invoiceid');
    var invoiceidError = document.querySelector('#smart-button-container #invoiceidError');
    var invoiceidDiv = document.querySelector('#smart-button-container #invoiceidDiv');

    var elArr = [description, amount];

    if (invoiceidDiv.firstChild.innerHTML.length > 1) {
      invoiceidDiv.style.display = "block";
    }

    var purchase_units = [];
    purchase_units[0] = {};
    purchase_units[0].amount = {};

    function validate(event) {
      return event.value.length > 0;
    }

    paypal.Buttons({
      style: {
        color: 'gold',
        shape: 'rect',
        label: 'paypal',
        layout: 'vertical',
        
      },

      onInit: function (data, actions) {
        actions.disable();

        if(invoiceidDiv.style.display === "block") {
          elArr.push(invoiceid);
        }

        elArr.forEach(function (item) {
          item.addEventListener('keyup', function (event) {
            var result = elArr.every(validate);
            if (result) {
              actions.enable();
            } else {
              actions.disable();
            }
          });
        });
      },

      onClick: function () {
        if (description.value.length < 1) {
          descriptionError.style.visibility = "hidden";
        } else {
          descriptionError.style.visibility = "hidden";
        }

        if (amount.value.length < 1) {
          priceError.style.visibility = "visible";
        } else {
          priceError.style.visibility = "hidden";
        }

        if (invoiceid.value.length < 1 && invoiceidDiv.style.display === "block") {
          invoiceidError.style.visibility = "visible";
        } else {
          invoiceidError.style.visibility = "hidden";
        }

        purchase_units[0].description = description.value;
        purchase_units[0].amount.value = amount.value;

        if(invoiceid.value !== '') {
          purchase_units[0].invoice_id = invoiceid.value;
        }
      },

      createOrder: function (data, actions) {
        return actions.order.create({
          purchase_units: purchase_units,
        });
      },

      onApprove: function (data, actions) {
        return actions.order.capture().then(function (orderData) {

          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

          // Show a success message within this page, e.g.
          const element = document.getElementById('paypal-button-container');
          element.innerHTML = '';
          element.innerHTML = '<h3>Thank you for your payment!</h3>';

          // Or go to another URL:  actions.redirect('thank_you.html');
          
        });
      },

      onError: function (err) {
        console.log(err);
      }
    }).render('#paypal-button-container');
  }
  initPayPalButton();
  </script>
</body>
</html>
