<?php
    include "tools/ddd.php";
    $form = new form();
    $lbname = new label('ชื่ออุปกรณ์การแพทย์');
    $lbunit= new label('หน่วย');
    $lbprice = new label('ราคา'); 
    $lbcomment = new label('หมายเหตุ');
    $lbmdeqtype = new label('ชนิดอุปกรณ์การแพทย์');
    $txtname = new textfield('mdeq_name','','form-control','','');
    $txtprice = new textfield('mdeq_price','','form-control','','');
    $submit = new buttonok('บันทึก ลูกค้า','btnSubmit','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();
   echo $form->open("","","col-12","insert_typemdeq.php","");
   ?>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 mt-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h3>เพิ่มชนิดอุปกรณ์การแพทย์</h3>
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
                                    <?php echo $lbprice;  ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <?php echo $txtprice;  ?>
                                </div>
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