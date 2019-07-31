    <?php
    include 'form/main_form.php';
        $form = new form();
        $text_user = new textfield('member_username','inputEmail','form-control usb','ลงชื่อเข้าสู่ระบบ');
        $text_pass = new pass('member_password','form-control usb','รหัสผ่าน','');
        $submit = new buttonok('Login','','btn btn-lg btn-primary btn-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','');
echo $form->open('','','','index.php?url=show_sale.php','');
    ?>
	<div class="lgm pl-3 pr-3 pb-3">
		<img class="lg mt-2 ml-3" src="images/fdp.png" />
		<div class="row mt-4">
			<img class="ml-3 pt-1 pb-1 pl-1 pr-1 imb" src="images/user.png" />
			<div class="form-group us">
				<?php echo $text_user; ?>
			</div>
		</div>
		<div class="row mt-2">
			<img class="ml-3 pt-1 pb-1 pl-1 pr-1 imb" src="images/pw.png" />
			<div class="form-group us">
				<?php echo $text_pass; ?>
			</div>
		</div>
		<button class="btn btn-primary btn-block mt-3 btc" type="submit">เข้าสู่ระบบ</button>
	</div>
   <?php echo $form->close();?>
