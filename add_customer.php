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
    $submit = new buttonok('บันทึก','bs','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();
    if(!empty($_GET['id'])){
			$id=$_GET['id'];
			$r = $db->findByPK(array('customer'),array('customer_id'=>$id));
			while($cols = $r->moveNext_getRow('assoc')){
				$txtname->value = $cols['customer_name'];
				$txtemail->value = $cols['customer_email'];
				$txtnickname->value = $cols['customer_nickname'];
				$txtposition->value = $cols['customer_position'];
				$txttel->value = $cols['customer_tel'];
				$txtaddress->value = $cols['customer_address'];
				$txtshop->value =$cols['customer_shop'];
		    }
	}
?>
<script>


</script>

<div class="col-12 card bdadd">
        <div class="row">
                <div class="col-12 pt-3 tx3 card-header">
                        <div class="row">
                                <span class="pl-2 achf">ลงทะเบียนรายชื่อผู้ติดต่อ</span>
                        </div>
                </div>
<?php  echo $form->open("form_reg","frmMain","col-12 tx1","insert_customer.php",""); ?>
                <div class="col-12">
                        <div class="row">
                                <div class="col-12 pt-3 pb-2 tx3 fs1">
                                        <div class="row">
                                                <i class="far fa-building pt-1 tx3"></i>&nbsp<span>ข้อมูลสถานประกอบการ</span>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 ml-3 pt-1 tx2 actext">
                                                        <?php echo $lbshop;  ?><span class="tx4">*</span>
                                                </div>
                                                <div class="w-100 ml-3 tx2 acpt1">
                                                        <?php echo $txtshop;  ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 ml-3 tx2 pt-1 actext">
                                                        <?php echo $lbaddress;  ?><span class="tx4">*</span>
                                                </div>
                                                <div class="w-100 ml-3 tx2 acpt2">
                                                        <?php echo $txtaddress;  ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2">
                                        <div class="row">
                                                <div class="w-100 ml-3 pt-1 tx2 actext">
                                                        <?php echo $lbprovince;  ?><span class="tx4">*</span>
                                                </div>
                                                <div class="w-100 ml-3 tx2 acpt3">
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
                                <div class="col-12 mt-2">
                                        <div class="row">
                                                <div class="w-100 ml-3 pt-1 tx2 actext">
                                                        <?php echo $lbdistrict;  ?><span class="tx4">*</span>
                                                </div>
                                                <div class="w-100 ml-3 tx2 acpt3">
                                                        <select id="selDistricts" name="customer_districts"class="form-control">
                                                        <option value=""> ----- เลือก ----- </option>
                                                         <?php
                                                     $db->findAll("districts");
                                                            while($cols = $db->moveNext_getRow('assoc')){
	                                                          echo '<option name="customer_districts" value="', $cols['districts_id'], '">', $cols['districts_name'],'</option>';
                                                            }
                                            ?>
                                                        </select><span id="waitDistricts"></span>
                                                </div>
                                        </div>
                                </div>
                                 <div class="col-12 mt-2">
                                        <div class="row">
                                                <div class="w-100 ml-3 pt-1 tx2 actext">
                                                        <?php echo $lbsubdistrict;  ?><span class="tx4">*</span>
                                                </div>
                                                <div class="w-100 ml-3 tx2 acpt3">
                                                        <select id="selSubdistricts" name="customer_subdistricts" class="form-control">
                                                        <option value=""> ----- เลือก ----- </option>
                                                          <?php
                                                     $db->findAll("subdistricts");
                                                            while($cols = $db->moveNext_getRow('assoc')){
	                                                          echo '<option name="customer_districts" value="', $cols['subdistricts_id'], '">', $cols['subdistricts_name'],'</option>';
                                                            }
                                            ?>

                                                        </select><span id="waitSubdistricts"></span>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-3 bdac">
                                </div>
                                <div class="col-12 pt-3 pb-2 tx3 fs1">
                                        <div class="row">
                                                <i class="fas fa-users pt-1 tx3"></i>&nbsp<span>ข้อมูลผู้ติดต่อ</span>
                                        </div>
                                </div>
                                <div class="col-12 mt-2">
                                        <div class="row">
                                                <div class="w-100 ml-3 pt-1 tx2 actext">
                                                        <?php echo $lbname;  ?><span class="tx4">*</span>
                                                </div>
                                                <div class="w-100 ml-3 tx2 acpb1">
                                                        <?php echo $txtname;  ?>
                                                </div>
                                                <div class="w-100 ml-3 pt-1 tx2 actext3">
                                                        <?php echo $lbnickname;  ?><span class="tx4">*</span>
                                                </div>
                                                <div class="w-100 ml-3 tx2 acpb2">
                                                        <?php echo $txtnickname;  ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2">
                                        <div class="row">
                                                <div class="w-100 ml-3 pt-1 tx2 actext">
                                                        <?php echo $lbposition;  ?><span class="tx4">*</span>
                                                </div>
                                                <div class="w-100 ml-3 tx2 acpb3">
                                                        <?php echo $txtposition;  ?>
                                                </div>
                                                <div class="w-100 ml-3 pt-1 tx2 actext4">
                                                        <?php echo $lbtel;  ?><span class="tx4">*</span>
                                                </div>
                                                <div class="w-100 ml-3 tx2 acpb4">
                                                        <?php echo $txttel;  ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2">
                                        <div class="row">
                                                <div class="w-100 ml-3 pt-1 tx2 actext">
                                                        <?php  echo $lbemail;  ?><span class="tx4">*</span>
                                                 </div>
                                                <div class="w-100 ml-3 tx2 acpb3">
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
                                <div class="col-xl-11 col-lg-10 col-md-10 col-9"></div>
                                <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
                                <input type="hidden" name="emp_emp_id" value="<?=$_SESSION['emp_id']?>"/>
                                <div class="col-xl-1 col-lg-2 col-md-2 col-3">
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
