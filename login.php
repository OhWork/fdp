    <?php
    include 'form/main_form.php';
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
 
