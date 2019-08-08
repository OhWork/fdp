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
    $txtname = new textfield('customer_name','','form-control','ชื่อ-นามสกุล','');
    $txtnickname = new textfield('customer_name','','form-control','ชื่อเล่น','');
    $txtposition = new textfield('customer_position','','form-control','ตำแหน่ง','');
    $txtaddress = new textfield('customer_address','','form-control','ที่อยู่','');
    $txtshop = new textfield('customer_shop','','form-control','ชื่อร้าน','');
    $txttel = new textfield('customer_tel','','form-control','เบอร์โทรศัพท์','');
    $txtemail = new textfield('customer_email','','form-control','อีเมล','');
    $txtsubdistrict = new textfield('customer_subdistricts','','form-control','','');
    $txtdistrict = new textfield('customer_districts','','form-control','','');
    $txtprovince = new textfield('customer_provinces','','form-control','','');
    $submit = new buttonok('ยินยันการส่งข้อมูล','bs','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();?>
<div class="row">
<div class="col-12 bg1">
  <div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="row">
        <div class="col-12 pt-3 pb-2 tx2">
           <div class="row">
                <h2 class="pl-3">ลงทะเบียนรายชื่อผู้ติดต่อ</h2>
           </div>
        </div>
    <?php
    echo $form->open("","","col-12 tx1","insert_customer.php","");
    ?>
        <div class="col-12 mt-3">
            <div class="row">
<!--                <div class="col-12 tx2">
                    <div class="row">
                            <?php // echo $lbname;  ?>
                    </div>
                </div>-->
                <div class="col-12">
                    <div class="row">
                            <?php echo $txtname;  ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-6 mt-2">
                            <div class="row">
<!--                                <div class="col-12 tx2">
                                    <div class="row">
                                        <?php // echo $lbposition;  ?>
                                    </div>
                                </div>-->
                                <div class="col-12">
                                    <div class="row">
                                        <?php echo $txtposition;  ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mt-2">
                            <div class="row">
<!--                                <div class="col-12 pr-0 tx2">
                                    <?php // echo $lbnickname;  ?>
                                </div>-->
                                <div class="col-12 pr-0">
                                    <?php echo $txtnickname;  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                 <div class="col-12 mt-2 tx2">
                    <div class="row">
                            <?php // echo $lbshop;  ?>
                    </div>
                </div>-->
                <div class="col-12 mt-2">
                    <div class="row">
                            <?php echo $txtshop;  ?>
                    </div>
                </div>
                <div class="col-12 mt-2">
                    <div class="row">
                        <div class="col-6 mt-2">
                            <div class="row">
                                <div class="col-12 tx2">
                                    <div class="row">
                                        <?php // echo $lbtel;  ?>
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
                                <div class="col-12 pr-0 tx2">
                                    <?php // echo $lbemail;  ?>
                                </div>
                                <div class="col-12 pr-0">
                                    <?php echo $txtemail;  ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-2 tx2">
                    <div class="row">
                        <?php // echo $lbaddress;  ?>
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
                                <div class="col-12 pl-0 tx2">
                                    <?php echo $lbprovince;  ?>
                                </div>
                                <div class="col-12 pl-0">
                                    <select id="selProvince" class="form-control">
                                    <option value=""> ------- เลือก ------ </option>
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
                                    <div class="row">
                                        <?php echo $lbdistrict;  ?>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <select id="selDistricts" class="form-control">
                                        <option value=""> ------- เลือก ------ </option>
                                        </select><span id="waitDistricts"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 mt-2">
                            <div class="row">
                                <div class="col-12 pr-0 tx2">
                                    <?php echo $lbsubdistrict;  ?>
                                </div>
                                <div class="col-12 pr-0">
                                    <select id="selSubdistricts" class="form-control">
                                    <option value=""> ------- เลือก ------ </option>
                                    </select><span id="waitSubdistricts"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-12 mb-5">
                    <div class="row">
                        <input type="hidden" name="token" value="<?=$_SESSION['token']?>"/>
                        <input type="hidden" name="sale_sale_id" value="<?=$sale_id?>"/>
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 pl-0">
                                    <?php echo $submit; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-8"></div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $form->close(); ?>
    <div class="col-4"></div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function () {
    $('#bs').on('click', function () {
        Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)
    });
	});
</script>