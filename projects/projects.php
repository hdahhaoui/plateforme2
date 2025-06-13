<?php 
 require '../include/config.php';
 require '../include/db.php';

 if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
     header('Location: login.php');
     exit;
 }
 if (!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'freelancer') {
     header('Location: login.php');
     exit;
 }
 $fid = $_SESSION['USER_ID'];
 //aji
 $result = $mysqli->query("SELECT `lang` FROM `freelancer` WHERE `fid` = $fid");
 $row = $result && $result->num_rows ? $result->fetch_assoc() : null;
 $lang = $row['lang'] ?? '';


$result = $mysqli->query("SELECT * FROM post_req RIGHT JOIN projects ON post_req.pid = projects.id ORDER BY post_req.status DESC;");

 $count = $result->num_rows;
 
 $result3 = $mysqli->query("SELECT * FROM `freelancer` WHERE `fid` = $fid");
 $row3 = $result3 && $result3->num_rows ? $result3->fetch_assoc() : null;


 

?>
<!DOCTYPE html>


<body>
<div class="job">
 <div class="header">
  <div class="logo">
   <img src="logo.png" height="30px" style="margin-right: 10px;" alt="" srcset="">
   Codify
  </div>
  <div class="header-menu">
   
  </div>
  <div class="user-settings">
   <div class="dark-light">
    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
   </div>

   <img class="user-profile" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3364143/download+%283%29+%281%29.png" alt="">
   <div class="user-name"><?php echo $row3['name'] ?? ''?></div>
   <a class="logout-link" href="../include/logout.php">Logout</a>
  </div>
 </div>


 <div class="banner">
  <div>
  <h1>Dashboard <br> <span> Freelancer</span></h1>  <br>
  <div class="down-buttons">
                    <div class="main-blue-button-hover">
                      <a href="#missions">Voir Missions déposées</a>
                    </div>

                  </div>
  </div>
  <div class="imageback">
    <img src="bg.svg" alt="">
  </div>
 
 </div> 
  </div>



 <div class="wrapper">
  <div class="search-menu">
   <div class="search-bar search">
    <input type="text" class="search-box search input" autofocus />
   </div>
  </div>
  <div class="main-container">
  
   <div class="searched-jobs">
    <div class="searched-bar">
     <div class="searched-show">Showing <?php echo $lang?> Jobs</div>
     
    </div>
    <div id="missions" class="job-cards projects-list">
    <?php
    while ($row = $result->fetch_assoc()) {
            ?>
            <div class="job-card">
            <div class="job-card-header">
             <svg viewBox="0 -13 512 512" xmlns="http://www.w3.org/2000/svg" style="background-color:#2e2882">
              <g fill="#feb0a5">
               <path d="M256 92.5l127.7 91.6L512 92 383.7 0 256 91.5 128.3 0 0 92l128.3 92zm0 0M256 275.9l-127.7-91.5L0 276.4l128.3 92L256 277l127.7 91.5 128.3-92-128.3-92zm0 0" />
               <path d="M127.7 394.1l128.4 92 128.3-92-128.3-92zm0 0" />
              </g>
              <path d="M512 92L383.7 0 256 91.5v1l127.7 91.6zm0 0M512 276.4l-128.3-92L256 275.9v1l127.7 91.5zm0 0M256 486.1l128.4-92-128.3-92zm0 0" fill="#feb0a5" />
             </svg>
             <?php
        $res = $mysqli->query("SELECT * FROM `post_req` WHERE `pid` = {$row['id']}");
            if ($res->num_rows) {
                $r = $res->fetch_assoc();
                $status = empty($r['status']) ? 'Requested' : $r['status'];
            } else {
                $status = '';
            }?>
             <div class="label"><?=$status?></div>
            </div>
            <div class="job-card-title"><?=ucfirst($row['title'])?></div>
            
            <div class="job-card-subtitle">
            <?=substr($row['description'], 0, 100)?>
            </div>
            <div class="job-card-subtitle">
            </div>
            <div class="job-detail-buttons">
             <button class="search-buttons detail-button">Cost : </i> <?=$row['budget']?></button>
             <button class="search-buttons detail-button"><?=$row['lang']?></button>
             
            </div>
            <div class="job-card-buttons">
            <button class="search-buttons card-buttons"><a style="text-decoration:none;"href="../projects.php?pid=<?=$row['id']?>">Apply Now</a></button>
             <button class="search-buttons card-buttons-msg"><a style="text-decoration:none;"href="../users.php?pid=<?=$row['id']?>&cid=<?=$row['cid']?>" >php chat</a></button>
            </div>
           </div>
        
           <?php
        }
?>
     
    </div>
  </div>
 </div>
</div>
<script src="projects.js"></script>
<script src="../freelancersearch/users.js"></script>
</body>
</html>