<?php
    include "tools/ddd.php";
    $form = new form();
    $lbname = new label('ชื่อ-นามสกุล');
    $lbidcard = new label('บัตรประชาชน');
    $lbbd = new label('วันเดือนปีเกิด');
    $lbaddress = new label('ที่อยู่');
    $lbtel = new label('เบอร์โทรศัพท์');
    $lbemail = new label('อีเมล');
    $lbpic = new label('รูปโปรไฟล์');
    $lbpass = new label('รหัสผ่าน');
    $lbpasscon = new label('ยืนยันรหัสผ่าน');
    $lbsubdistrict = new label('แขวง/ตำบล');
    $lbdistrict = new label('เขต/อำเภอ');
    $lbprovince = new label('จังหวัด');
    $lbcomment = new label('หมายเหตุ');
    $txtname = new textfield('emp_name','','form-control','','');
    $txtaddress = new textfield('emp_address','','form-control','','');
    $txttel = new textfield('emp_tel','','form-control','','');
    $txtbd = new textfield('emp_bd','','form-control','','');
    $txtcomment = new textfield('emp_comment','','form-control ch','','');
    $txtemail = new textfield('emp_email','','form-control','','');
    $txtidcard = new textfield('emp_idcard','','form-control','','');
    $txtpass = new textfield('emp_password','emp_pass','form-control','','emp_pass');
    $txtpasscon = new textfield('emp_passcon','emp_pass_confirm','form-control','','emp_pass_confirm');
    $txtsubdistrict = new textfield('emp_subdistricts','','form-control','','');
    $txtdistrict = new textfield('emp_districts','','form-control','','');
    $txtprovince = new textfield('emp_provinces','','form-control','','');
    $submit = new buttonok('บันทึก','btnSubmit','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();
?>
<div class="col-12">
        <div class="row">
                <div class="col-xl-3 col-lg-2 col-md-2 col-xs-1"></div>
                        <div class="col-xl-6 col-lg-8 col-md-8 col-xs-10 col-12 bg-dark bdac1">
                            <div class="row">
                                <div class="col-12 pt-3 tx3">
                                        <div class="row">
                                                <h2 class="pl-3">เพิ่มพนักงาน</h2>
                                        </div>
                                </div>
<?php echo $form->open("form_reg","","col-12","insert_emp.php",""); ?>
                                <div class="col-12 pt-3 pb-2 tx5 fs1">
                                        <div class="row">
                                            <i class="fas fa-sign-in-alt pt-1 tx5"></i>&nbsp<span>ข้อมูลเข้าสู่ระบบ</span>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <?php echo $lbemail;  ?><span class="tx4">*</span>
                                </div>
                                <div class="col-12">
                                        <?php echo $txtemail;  ?>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="col-6">
                                                        <div class="row">
                                                                <div class="col-12">
                                                                        <?php echo $lbpass;  ?><span class="tx4">*</span>
                                                                </div>
                                                                <div class="col-12">
                                                                        <?php echo $txtpass;  ?>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="row">
                                                                <div class="col-12">
                                                                        <?php echo $lbpasscon;  ?><span class="tx4">*</span>
                                                                </div>
                                                                <div class="col-12">
                                                                        <?php echo $txtpasscon;  ?>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 pt-3 pb-2 tx5 fs1">
                                        <div class="row">
                                            <i class="fas fa-user-tie pt-1 tx5"></i>&nbsp<span>ข้อมูลพนักงาน</span>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <?php echo $lbname;  ?><span class="tx4">*</span>
                                </div>
                                <div class="col-12">
                                        <?php echo $txtname;  ?>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="col-6">
                                                        <div class="row">
                                                                <div class="col-12">
                                                                        <?php echo $lbidcard;  ?><span class="tx4">*</span>
                                                                </div>
                                                                <div class="col-12">
                                                                        <?php echo $txtidcard;  ?>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="row">
                                                                <div class="col-12">
                                                                        <?php echo $lbbd;  ?><span class="tx4">*</span>
                                                                </div>
                                                                <div class="col-12">
                                                                        <?php echo $txtbd;  ?>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <?php echo $lbaddress;  ?><span class="tx4">*</span>
                                </div>
                                <div class="col-12">
                                        <?php echo $txtaddress;  ?>
                                </div>
                                <div class="col-12">
                                        <div class="row">
                                                <div class="col-4 mt-2">
                                                        <div class="row">
                                                                <div class="col-12 pr-0 tx2">
                                                                    <?php echo $lbprovince;  ?><span class="tx4">*</span>
                                                                </div>
                                                                <div class="col-12 pr-0">
                                                                    <select id="selProvince" name="emp_provinces" class="form-control">
                                                                    <option value=""> ----- เลือก ----- </option>
                                                            <?php
                                                                     $db->findAll("provinces");
                                                                            while($cols = $db->moveNext_getRow('assoc')){
                                                                            echo '<option name="customer_provinces" value="', $cols['provinces_id'], '">', $cols['provinces_name'],'</option>';
                                                                            }
                                                            ?>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-4 mt-2">
                                                        <div class="row">
                                                                <div class="col-12 tx2">
                                                                        <?php echo $lbdistrict;  ?><span class="tx4">*</span>
                                                                </div>
                                                                <div class="col-12">
                                                                        <select id="selDistricts" name="emp_districts" class="form-control">
                                                                        <option value=""> ----- เลือก ----- </option>
                                                                        </select><span id="waitDistricts"></span>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-4 mt-2">
                                                        <div class="row">
                                                                <div class="col-12 pl-0 tx2">
                                                                    <?php echo $lbsubdistrict;  ?><span class="tx4">*</span>
                                                                </div>
                                                                <div class="col-12 pl-0">
                                                                    <select id="selSubdistricts" name="emp_subdistricts" class="form-control">
                                                                    <option value=""> ----- เลือก ----- </option>
                                                                    </select><span id="waitSubdistricts"></span>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="col-6">
                                                        <div class="row">
                                                                <div class="col-12">
                                                                        <?php echo $lbtel;  ?><span class="tx4">*</span>
                                                                </div>
                                                                <div class="col-12">
                                                                        <?php echo $txttel;  ?>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-6">
                                                        <div class="row">
                                                                <div class="col-12">
                                                                        <?php echo $lbpic;  ?><span class="tx4">*</span>
                                                                </div>
                                                                <div class="col-12">
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <?php echo $lbcomment;  ?>
                                </div>
                                <div class="col-12 tx2">
                                        <?php echo $txtcomment;  ?>
                                </div>
                                <div class="col-12 mt-3 mb-3">
                                        <div class="row">
                                                <div class="col-9"></div>
                                                <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
                                                <input type="hidden" name="emp_emp_id" value="<?=$_SESSION['emp_id']?>"/>
                                                <div class="col-3">
                                                        <div class="row">
                                                                <div class="col-12 pl-0">
                                                                    <?php echo $submit; ?>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                            </div>
                        </div>
        <?php echo $form->close(); ?>
                <div class="col-xl-3 col-lg-2 col-md-2 col-xs-1"></div>
</div>
</div>
<script>
    $('#emp_email').keyup(function(){
		console.log($('#emp_email').val().length);
		$.ajax({
	            url: "check_emp.php",
	            data: {user_user : $('#user_user').val()},
	            type: "POST",
	            success: function(data) {
		           	$('#msg').show();
	                if((data > '0')) {
	                    $("#msg").html('<span class="text-danger">ชื่อผู้ใช้ไม่สามารถใช้งานได้</span>');
	                } else {
		                $("#msg").html('<span class="text-success">ชื่อผู้ใช้นี้สามารถใช้ได้</span>');
	                }
	            },
	           error: function(XMLHttpRequest, textStatus, errorThrown) {
			   alert("some error");
	  		   }
	     });
    });
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#form_reg" ).validate({
  rules: {
    emp_email: {
      required: true,
      email: true
    },
    emp_password: "required",
    emp_passcon: {
	  required: true,
      equalTo: "#emp_pass"
    },
    emp_name: "required",
    emp_address: "required",
    emp_tel: "required",
    emp_idcard: "required",
    emp_subdistricts: "required",
    emp_districts: "required",
    emp_provinces: "required",
    emp_bd: "required",
  }
});
 </script>
