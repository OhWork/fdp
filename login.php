<!doctype html>
<html lang="en">
  <head>
	  <?php //แก้ content เป็น client id ที่ config ไว้กับ google?>
	<meta name="google-signin-client_id" content="977916372948-p4d07ppqrn4i4m5paush7crr6qvicscq.apps.googleusercontent.com">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <?php  include 'inc_js.php';
            include 'form/main_form.php';
            include 'form/gridview.php';
            //  include 'village/database/db_tools.php';
            //  include 'village/connect.php';
      ?>

    <title>เข้าสู่ระบบ</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="CSS/bootstrap.css">
    <link rel="stylesheet" href="CSS/floating-labels.css">
    <link rel="stylesheet" href="CSS/sticky-footer.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="CSS/jquery-ui.css">
    <link rel="stylesheet" href="CSS/main.css">

  </head>

  <body>
    <?php
		$form = new form();
		$text_user = new textfield('member_username','inputEmail','form-control','ลงชื่อเข้าสู่ระบบ');
		$text_pass = new pass('member_password','form-control','Password','รหัสผ่าน');
		$submit = new buttonok('Login','','btn btn-lg btn-primary btn-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','');
		echo $form->open('','','','check_login.php','');
    ?>
	<div class="lgm">
		<img class="lg" src="images/fdp.png" />
		<div class="form-label-group mt-5">
			<?php echo $text_user; ?>
		</div>
		<div class="form-label-group mt-2">
			<?php echo $text_pass; ?>	
		</div>
		<div class="checkbox mb-3 mt-2">
			<div class="row">
				<input class="mt-2 ml-3" type="checkbox" value="remember-me"><p class="ml-1">จดจำฉันไว้</p>
			</div>
		</div>
		<button class="btn btn-primary btn-block mb-3" type="submit">เข้าสู่ระบบ</button>
	</div>
   <?php echo $form->close();?>
  </body>
</html>
