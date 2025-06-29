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
if (empty($_GET['pid'])) {
    $pid = 0;
} else {
    $pid = $_GET['pid'];

    $result = $mysqli->query("SELECT * FROM `projects` WHERE `id` = $pid");

    if ($result && $result->num_rows) {
        $row = $result->fetch_assoc();
    } else {
        $pid = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
	<meta content="IE=11.0000" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=($pid ? 'Edit' : 'Add')?>Post Project - Codify</title>

	<link href="<?=$favicon?>" rel="shortcut icon">
	<link href="<?=$favicon?>" rel="icon" type="image/x-icon" />

    <!-- Bootstrap Core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
    <link rel="stylesheet" href="post.css">

</head>

<body id="page-top">

    <!-- Header -->
	<?php
    require 'include/header.php';
    ?>

    <header class="masthead">
        <div class="container text-center">
            <!--<h2 class="mx-auto mb-5"></h2>-->
            <div class="sinup-box card">
                <div class="card-body">
                    <form class="form-material form-horizontal m-t-40 needs-validation" id="postForm" action="include/<?=($pid ? 'update' : 'add')?>-post.php" method="post" novalidate enctype="multipart/form-data">
                        <h3 class="text-center m-b-20"><?=($pid ? 'Edit' : 'Post New')?> Project</h3>
                        <input type="hidden" name="pid" value="<?=$pid?>">
                        <div class="form-group">
                        <?php
                        if (isset($_SESSION['msg']) && $_SESSION['msg'] != '') {
                            ?>
				        <div class="alert alert-<?=$_SESSION['msg']['type']?> alert-dismissable">
					        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					        <?=$_SESSION['msg']['msg']?>
				        </div>
                        <?php
                            $_SESSION['msg'] = '';
                            unset($_SESSION['msg']);
                        }
                        ?>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <label for="name" class="text-info">Choose a name for your project</label>
                                <input type="text" id="name" name="name" class="form-control form-control-line form-control-success" placeholder="Project Name" required value="<?=@$row['title']?>">
                                <div class="invalid-feedback help text-left">
                                    Please enter name of project.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <label for="prjtype" class="text-info">Choose type of your project</label>
                                <select class="form-control form-control-line custom-select" id="prjtype" name="prjtype" required>
                                    <option value="" <?=@($row['category'] == '') ? 'selected' : ''?>>Project Type </option>
                                    <option value="Design Graphique" <?=@($row['category'] == 'Design Graphique') ? 'selected' : ''?>>Design Graphique</option>
                                    <option value="Developpement Mobile" <?=@($row['category'] == 'Developpement Mobile') ? 'selected' : ''?>>Developpement Mobile</option>
                                    <option value="Video & Animation" <?=@($row['category'] == 'Video & Animation') ? 'selected' : ''?>>Video & Animation</option>
                                    <option value="Marketing et Vente" <?=@($row['category'] == 'Marketing et Vente') ? 'selected' : ''?>>Marketing et Vente</option>
                                    <option value="E-Commerce , CMS et ERP" <?=@($row['category'] == 'E-Commerce , CMS et ERP') ? 'selected' : ''?>>E-Commerce , CMS et ERP</option>
                                </select>
                                <div class="invalid-feedback help text-left">
                                    Please select your project type.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <label for="about" class="text-info">Tell us more about your project</label>
                                <textarea id="about" name="about" class="form-control form-control-line form-control-success" placeholder="Project Description" required value="" rows="3"><?=@$row['description']?></textarea>
                                <div class="invalid-feedback help text-left">
                                    Please enter description of project.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <label for="lang" class="text-info">What skills are required?</label>
                                <input type="text" id="lang" name="lang" class="form-control form-control-line" placeholder="Langauge or Skill" required="" value="<?=@$row['lang']?>">
                                <div class="invalid-feedback help text-left">
                                    Please enter your langauge or skill.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <label for="cost" class="text-info col-form-label">What is your budget?</label>
                                <input type="number" id="cost" name="cost" class="form-control form-control-line" placeholder="Project Cost in INR" required="" value="<?=@$row['budget']?>" min="600" max="100000">
                                <div class="invalid-feedback help text-left">
                                    Please enter your project budget.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <label for="deadline" class="text-info">Project deadline</label>
                                <input type="date" id="deadline" name="deadline" class="form-control form-control-line" required value="<?=@$row['deadline']?>">
                                <div class="invalid-feedback help text-left">
                                    Please provide a project deadline.
                                </div>
                            </div>
                        </div>
                        <!--div class="form-group">
                            <div class="col-xs-12 text-danger text-left">
                                <label for="cost" class="text-info col-form-label">How long would you like to run your contest?</label>
                                <input type="number" id="cost" name="cost" class="form-control form-control-line" placeholder="Project Duration in Days" required="" value="" min="3" max="30">
                                <div class="invalid-feedback help text-left">
                                    Please enter your project duration.
                                </div>
                            </div>
                        </div-->

                        <!--  by me  -->
                        <!-- <div class="form-group">
                            <div class="col-xs-12">
                                Work with a freelancer 1‑on‑1 and only pay them when you're happy with the completed work.
                            </div>
                        </div> -->
                        <div class="form-group text-center p-b-20">
                            <div class="col-xs-12">
                                
                                <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit" id="postBtn"><?=($pid ? 'Edit' : 'Post')?> Project</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            $uid = $_SESSION['USER_ID'];
            $stmt = $mysqli->prepare('SELECT id,title,budget,deadline,status FROM projects WHERE user_id=? ORDER BY created_at DESC');
            if ($stmt) {
                $stmt->bind_param('i', $uid);
                $stmt->execute();
                $projects = $stmt->get_result();
            }
            ?>
            <h4 class="mt-5">My Projects</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Budget</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (isset($projects)): while ($p = $projects->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['title']) ?></td>
                        <td><?= htmlspecialchars($p['budget']) ?></td>
                        <td><?= htmlspecialchars($p['deadline']) ?></td>
                        <td>
                            <form method="post" action="include/update-status.php" class="form-inline">
                                <input type="hidden" name="pid" value="<?= $p['id'] ?>">
                                <select name="status" class="form-control form-control-sm mr-2">
                                    <option value="open" <?= $p['status']==='open'?'selected':'' ?>>open</option>
                                    <option value="in progress" <?= $p['status']==='in progress'?'selected':'' ?>>in progress</option>
                                    <option value="completed" <?= $p['status']==='completed'?'selected':'' ?>>completed</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-secondary" href="post.php?pid=<?= $p['id'] ?>">Edit</a>
                        </td>
                    </tr>
                <?php endwhile; endif; ?>
                </tbody>
            </table>
        </div>
    </header>

    <!-- Footer -->
	<?php
    require 'include/footer.php';
    ?>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

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
        /*
		$.validator.setDefaults( {
			submitHandler: function () {
                $('#signupBtn').attr('disabled','disabled');
                $('#signupForm').attr('disabled','disabled');
                $('#signupForm').addClass('disabled');
                $('#name').attr('disabled','disabled');
                $('#email').attr('disabled','disabled');
                $('#password').attr('disabled','disabled');
                $('#cpassword').attr('disabled','disabled');
                $('#usertype').attr('disabled','disabled');
                $('#cv').attr('disabled','disabled');
                $('#id').attr('disabled','disabled');
                $('#agree').attr('disabled','disabled');

                $( "#signupForm" ).submit();
				//$( "#btn" ).html('');
                //alert( "submitted!" );
			}
		} );

		$( document ).ready( function () {
			$( "#signupForm" ).validate( {
				rules: {
					name: {
						required: true,
						minlength: 5
					},
					email: {
						required: true,
						email: true
					},
					password: {
						required: true,
						minlength: 6
					},
					cpassword: {
						required: true,
						minlength: 6,
						equalTo: "#password"
					},
					usertype: "required",
					cv: "required",
					id: "required",
					agree: "required"
				},
				messages: {
					name: {
						required: "Please enter your full name",
						minlength: "Your name must consist of at least 5 characters"
					},
					email: "Please enter a valid email",
					password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 6 characters long"
					},
					cpassword: {
						required: "Please provide a password",
						minlength: "Your password must be at least 6 characters long",
						equalTo: "Please enter the same password as above"
					},
					usertype: "Please select your usertype",
					cv: "Please upload your resume",
					id: "Please upload yourr ID-Proof",
					agree: "Please accept our policy"
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
        */
	</script>
    
    <!-- Custom Theme JavaScript -->
    <script>
    /*
    $(function() {

  $("#signupForm input,#signupForm select").jqBootstrapValidation({
    preventSubmit: true,
    submitError: function($form, event, errors) {
      alert(0);
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
      alert(1);
      event.preventDefault(); // prevent default submit behaviour
      // get values from FORM
      var name = $("input#name").val();
      var email = $("input#email").val();
      var phone = $("input#phone").val();
      var message = $("textarea#message").val();
      var firstName = name; // For Success/Failure Message
      // Check for white space in name for Success/Fail message
      if (firstName.indexOf(' ') >= 0) {
        firstName = name.split(' ').slice(0, -1).join(' ');
      }
      $this = $("#sendMessageButton");
      $this.prop("disabled", true); // Disable submit button until AJAX call is complete to prevent duplicate messages
      $.ajax({
        url: "../../include/contact_me.php",
        type: "POST",
        data: {
          name: name,
          phone: phone,
          email: email,
          message: message
        },
        cache: false,
        success: function() {
          // Success message
          $('#success').html("<div class='alert alert-success'>");
          $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-success')
            .append("<strong>Your message has been sent. </strong>");
          $('#success > .alert-success')
            .append('</div>');
          //clear all fields
          $('#contactForm').trigger("reset");
        },
        error: function() {
          // Fail message
          $('#success').html("<div class='alert alert-danger'>");
          $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
            .append("</button>");
          $('#success > .alert-danger').append($("<strong>").text("Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!"));
          $('#success > .alert-danger').append('</div>');
          //clear all fields
          $('#contactForm').trigger("reset");
        },
        complete: function() {
          setTimeout(function() {
            $this.prop("disabled", false); // Re-enable submit button when AJAX call is complete
          }, 1000);
        }
      });
    },
    filter: function() {
      return $(this).is(":visible");
    },
  });

  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});
    */

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
</body>
</html>
