    <?php
    session_start();
        $token = new tokens();
        $tk = $token->openToken();
        $form = new form();
        $text_user = new textfield('emp_email','inputEmail','form-control w-100 usb','ลงชื่อเข้าสู่ระบบ');
        $text_pass = new pass('emp_password','form-control usb','รหัสผ่าน','');
        $submit = new buttonok('Login','','btn btn-lg btn-primary btn-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12','');
echo $form->open('','','','check_login.php','');
    ?>
<div class="lgm pl-3 pr-3 pb-3">
        <img class="lg mt-2 ml-3" src="images/fdp.png" />
        <div class="form-group col-12 mt-4 mb-0">
               <div class="row">
                   <i class="fas fa-user imb pt-2 pb-1 pl-2 pr-2 tx2"></i><div style="width:248.75px;"><?php echo $text_user; ?></div>
                </div>
        </div>
        <div class="form-group col-12 mt-2">
                <div class="row">
                    <i class="fas fa-unlock-alt imb pt-2 pb-1 pl-2 pr-2 tx2"></i><div style="width:248.75px;"><?php echo $text_pass; ?></div>
                </div>
        </div>
                 <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
<!--        <button class="btn btn-primary btn-block mt-3 btc" type="submit">เข้าสู่ระบบ</button>-->
</div>
   <?php echo $form->close();?>
<button class="btn btn-primary btn-block mt-3 btn-circle pt-2 bton" type="submit" title="เข้าสู่ระบบ"><i class="fas fa-sign-in-alt"></i></button>