<?php
    include "tools/ddd.php";
    $form = new form();
    $lbname = new label('ชื่อ-นามสกุล');
    $lbidcard = new label('บัตรประชาชน');
    $lbtel = new label('เบอร์โทรศัพท์');
    $lbemail = new label('อีเมล');
    $lbpass = new label('รหัสผ่าน'); 
    $lbpasscon = new label('ยืนยันรหัสผ่าน'); 
    $lbsubdistrict = new label('แขวง/ตำบล');
    $lbdistrict = new label('เขต/อำเภอ');
    $lbprovince = new label('จังหวัด');
    $txtname = new textfield('emp_name','','form-control','','');
    $txtaddress = new textfield('emp_address','','form-control','','');
    $txttel = new textfield('emp_tel','','form-control','','');
    $txtemail = new textfield('emp_email','','form-control','','');
    $txtpass = new textfield('emp_password','user_pass','form-control','','');
    $txtpasscon = new textfield('emp_passcon','user_pass_confirm','form-control','','');
    $txtsubdistrict = new textfield('emp_subdistricts','','form-control','','');
    $txtdistrict = new textfield('emp_districts','','form-control','','');
    $txtprovince = new textfield('emp_provinces','','form-control','','');
    $submit = new buttonok('บันทึก ลูกค้า','','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();
   echo $form->open("","","col-12","insert_customer.php","");
   ?>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 mt-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h3>เพิ่มลูกค้า</h3>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="row">
                        <?php echo $lbname;  ?>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                        <?php echo $txtname;  ?>
                </div>
            </div>
            <div class="col-12 pb-5">
                <div class="row">
                    <div class="col-6 mt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <?php echo $lbposition;  ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <?php echo $txtposition;  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="row">
                            <div class="col-12 pr-0">
                                <?php echo $lbshop;  ?>
                            </div>
                            <div class="col-12 pr-0">
                                <?php echo $txtshop;  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 bdac"></div>
            <div class="col-12 mt-5">
                <div class="row">
                    <?php echo $lbaddress;  ?>
                </div>
             </div>
            <div class="col-12">
                <div class="row">
                    <?php echo $txtaddress;  ?>
                </div>
            </div>
            <div class="col-12 pb-5">
                <div class="row">
                    <div class="col-4 mt-2">
                        <div class="row">
                            <div class="col-12 pl-0">
                                <?php echo $lbsubdistrict;  ?>
                            </div>
                            <div class="col-12 pl-0">
                                    <select id="selSubdistricts">
    	<option value=""> ------- เลือก ------ </option>
    </select><span id="waitSubdistricts"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <?php echo $lbdistrict;  ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                        <select id="selDistricts">
    	<option value=""> ------- เลือก ------ </option>
    </select><span id="waitDistricts"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 mt-2">
                        <div class="row">
                            <div class="col-12 pr-0">
                                <?php echo $lbprovince;  ?>
                            </div>
                            <div class="col-12 pr-0">
                                <select id="selProvince">
    	<option value=""> ------- เลือก ------ </option>
        <?php
                        $db->findAll("provinces");
			while($cols = $db->moveNext_getRow('assoc')){
				echo '<option value="', $cols['provinces_id'], '">', $cols['provinces_name'],'</option>';
			}
             ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            <div class="col-12 bdac"></div>
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-6 mt-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <?php echo $lbtel;  ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <?php echo $txttel;  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mt-2">
                        <div class="row">
                            <div class="col-12 pr-0">
                                <?php echo $lbemail;  ?>
                            </div>
                            <div class="col-12 pr-0">
                                <?php echo $txtemail;  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-6"></div>
                    <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
                    <input type="hidden" name="sale_sale_id" value="<?=$sale_id?>"/>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12 pr-0">
                                <?php echo $submit; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>
<script>
    $('#user_pass_confirm').focusout(function(){
                    var pass = $('#user_pass').val();
	    var passcon =  $('#user_pass_confirm').val();
	    //var passconmd5 = $.md5($.md5($.md5(passcon)));
	    //var passmd5 =$.md5($.md5($.md5(pass)));
	    if(pass == passcon){
		   $("#msg2").html('<span class="text-success">รหัสผ่านตรงกัน</span>');
 		   $("#btnSubmit").attr("disabled", false);
	    }
	    else{
		   $("#msg2").html('<span class="text-danger">รหัสผ่านไม่ตรงกัน</span>');
 		   $("#btnSubmit").attr("disabled", true);
	    }
    });
 </script>