<?php
    include "tools/ddd.php";
    $form = new form();
    $lbname = new label('ชื่อ-นามสกุล');
    $lbnickname = new label('ชื่อเล่น');
    $lbposition = new label('ตำแหน่ง');
    $lbaddress = new label('ที่อยู่');
    $lbshop = new label('ชื่อร้าน');
    $lbtel = new label('เบอร์โทรศัพท์');
    $lbemail = new label('อีเมล');
    $lbsubdistrict = new label('แขวง/ตำบล');
    $lbdistrict = new label('เขต/อำเภอ');
    $lbprovince = new label('จังหวัด');
    $txtname = new textfield('customer_name','','form-control','','');
    $txtnickname = new textfield('customer_nickname','','form-control','','');
    $txtposition = new textfield('customer_position','','form-control','','');
    $txtaddress = new textfield('customer_address','','form-control','','');
    $txtshop = new textfield('customer_shop','','form-control','','');
    $txttel = new textfield('customer_tel','','form-control','','');
    $txtemail = new textfield('customer_email','','form-control','','');
    $txtsubdistrict = new textfield('customer_subdistricts','','form-control','','');
    $txtdistrict = new textfield('customer_districts','','form-control','','');
    $txtprovince = new textfield('customer_provinces','','form-control','','');
    $submit = new buttonok('ยินยัน','bs','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();?>

<div class="col-12">
  <div class="row">
    <div class="col-xl-3 col-lg-2 col-md-2 col-xs-1"></div>
    <div class="col-xl-6 col-lg-8 col-md-8 col-xs-10 col-12 bg-dark bdac1">
        <div class="row">
        <div class="col-12 pt-3 tx3">
           <div class="row">
               <h2 class="pl-3">ลงทะเบียนรายชื่อผู้ติดต่อ</h2>
           </div>
        </div>
    <?php
    echo $form->open("form_reg","","col-12 tx1","insert_customer.php","");
    ?>
        <div class="col-12">
            <div class="row">
                 <div class="col-12 pt-3 pb-2 tx5 fs1">
                    <div class="row">
                        <i class="far fa-building pt-1 tx5"></i>&nbsp<span>ข้อมูลสถานประกอบการ</span>
                    </div>
                 </div>
                 <div class="col-12 mt-2 tx2">
                        <?php echo $lbshop;  ?><span class="tx4">*</span>
                </div>
                <div class="col-12">
                        <?php echo $txtshop;  ?>
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
                                    <select id="selProvince" name="customer_provinces" class="form-control">
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
                                        <select id="selDistricts" name="customer_districts"class="form-control">
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
                                    <select id="selSubdistricts" name="customer_subdistricts" class="form-control">
                                    <option value=""> ----- เลือก ----- </option>
                                    </select><span id="waitSubdistricts"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-12 mt-3 bdac">
                </div>
                <div class="col-12 pt-3 pb-2 tx5 fs1">
                    <div class="row">
                        <i class="fas fa-users pt-1 tx5"></i>&nbsp<span>ข้อมูลผู้ติดต่อ</span>
                    </div>
                 </div>
                <div class="col-12 mt-3 tx2">
                        <?php echo $lbname;  ?><span class="tx4">*</span>
                </div>
                <div class="col-12">
                        <?php echo $txtname;  ?>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 mt-2">
                            <div class="row">
                                <div class="col-12 pr-0 tx2">
                                    <?php echo $lbnickname;  ?><span class="tx4">*</span>
                                </div>
                                <div class="col-12 pr-0">
                                    <?php echo $txtnickname;  ?>
                                </div>
                            </div>
                        </div>
                         <div class="col-6 mt-2">
                            <div class="row">
                                <div class="col-12 tx2">
                                    <?php echo $lbposition;  ?>
                                </div>
                                <div class="col-12">
                                    <?php echo $txtposition;  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="row">
                        <div class="col-6 mt-2">
                            <div class="row">
                                <div class="col-12 tx2">
                                    <?php echo $lbtel;  ?><span class="tx4">*</span>
                                </div>
                                <div class="col-12 pr-0">
                                    <?php echo $txttel;  ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div class="row">
                                <div class="col-12 pr-0 tx2">
                                    <?php  echo $lbemail;  ?><span class="tx4">*</span>
                                </div>
                                <div class="col-12">
                                    <?php echo $txtemail;  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="col-12 mt-3 bdac">
                </div>-->
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
</div>
</div>
<script>
$(document).ready(function () {

	jQuery.validator.setDefaults({
		debug: true,
		success: "valid"
	});
	$( "#form_reg" ).validate({
		rules: {
		    customer_name: "required",
		    customer_nickname: "required",
		    customer_address: "required",
		    customer_shop: "required",
		    customer_tel: "required",
		    customer_email: "required",
		    customer_subdistricts: "required",
		    customer_districts: "required",
		    customer_provinces: "required",
  		}
	});
 });
</script>
