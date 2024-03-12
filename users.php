<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<!-- added by me -->
<?php    
        $user=$_SESSION['USER_TYPE'] ;
        $pid = (int) @$_GET['pid'];
        $fid =(int) @$_GET['fid'];
        $cid =(int) @$_GET['cid'];
        ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM mssgusers WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
            $_SESSION['pid']=$pid;
            $_SESSION['fid']=$fid;
            $_SESSION['cid']=$cid;

            // add admin id
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['name']?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <!--  go back to last page not working -->
        <a href="<?php echo $user?>.php" class="logout">BACK</a>
      </header>
      <div class="search" style="margin: 0px 0;">
        <input type="text" placeholder="Enter name to search...">
        <button><i class=""></i></button>
      </div>
      <div class="users-list">
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>
