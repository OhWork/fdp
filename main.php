	<?php
session_start();
	ob_start();
	error_reporting(0);
	if(empty($_SESSION['emp_name'])){
	  header( "Refresh: 0; index.php" );
	}
        ?>
<!--<nav class="navbar navbar-light w-100">
    <a href="index.php?url=add_customer.php" class="">เพิ่มข้อมูลลูกค้า</a>
    <button class="btn btn-danger btn-circle ml-auto" title="ออกจากระบบ"><img src="images/power.png" /></button>
</nav>-->
<body id="page-top"> 
<?php  include_once 'sale_menutop.php'; ?>
<?php  include_once 'sale_main_menu.php'; ?>
 
  

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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
