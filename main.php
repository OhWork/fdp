<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
         <?php
                include 'inc_js.php';
                include 'tools/db_tools.php';
                include 'tools/genToken.php';
                include 'connect.php';
                include 'form/main_form.php';
                include 'form/gridview.php';
          ?>
        <title>Friendship</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/floating-labels.css">
        <link rel="stylesheet" href="CSS/sticky-footer.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="CSS/jquery-ui.css">
        <link rel="stylesheet" href="CSS/sb-admin.css">
        <link rel="stylesheet" href="CSS/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="vendor/datetime/datetime-boostrap4.css">
        <link rel="stylesheet" href="CSS/sweetalert2.min.css">
        <link rel="stylesheet" href="CSS/main.css">

    </head>
<?php
                session_start();
	ob_start();
	//error_reporting(0);
	if(empty($_SESSION['emp_name'])){
	  header( "Refresh: 0; index.php" );
	}
        ?>

<!--<nav class="navbar navbar-light w-100">
    <a href="index.php?url=add_customer.php" class="">เพิ่มข้อมูลลูกค้า</a>
    <button class="btn btn-danger btn-circle ml-auto" title="ออกจากระบบ"><img src="images/power.png" /></button>
</nav>-->
<body id="page-top">
<?php  include_once 'menutop.php'; ?>
    <div id="wrapper" class="bg1">
        <?php  include_once 'main_menu.php'; ?>
        <div id="content-wrapper">
            <div class="container-fluid mb-3">
                <?php  include_once 'content.php'; ?>
            </div>
        <footer class="sticky-footer ftfdp">
                <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                    <span>Copyright © by Delicode.com 2019</span>
                  </div>
                </div>
            </footer>
        </div>
    </div><!-- /#wrapper -->
    <a class="scroll-to-top rounded" href="#page-top" style="display: none;">
            <i class="fas fa-angle-up"></i>
    </a>



  <!-- Scroll to Top Button-->
<!--  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>-->

<!--   Logout Modal
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>-->
</body>
<script>
$(document).ready(function () {
    $('#sidebarToggle').on('click', function () {
        $('body').toggleClass('sidebar-toggled')
        $('.sidebar').toggleClass('toggled');
    });
	});
</script>
