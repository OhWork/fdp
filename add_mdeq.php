<?php
    include "tools/ddd.php";
    $sql = "SELECT Max(mdeq_id)+1 as MaxID FROM mdeq";
    $db->createStement($sql);
    $db->runStmSql(array());
    $Count = $db->moveNext_getRow('assoc');
    $total = $Count["MaxID"];
    $code =  sprintf("P%'05d",$total);
    $form = new form();
    $lbmdeqcode= new label('รหัสอุปกรณ์การแพทย์');
    $lbname = new label('ชื่ออุปกรณ์การแพทย์');
    $lbunit= new label('หน่วย');
    $lbprice = new label('ราคา');
    $lbcomment = new label('หมายเหตุ');
    $lbtypemdeq = new label('ชนิดอุปกรณ์การแพทย์');
    $txtmdeqcode = new textfield('mdeq_code','','form-control','','');
    $txtmdeqcode->value = $code;
    $txtname = new textfield('mdeq_name','','form-control','','');
    $txtprice = new textfield('mdeq_price','','form-control','','');
    $txtunit = new textfield('mdeq_unit','','form-control','','');
    $txtcomment = new textArea('emp_comment','form-control ch','','', 3, 2,'');
    $radiomdeqenable = new radioGroup();
    $radiomdeqenable->name = 'mdeq_enable';
  if(empty($id)){
    	$radiomdeqenable->add('ใช้งานได้',1,'','');
    	$radiomdeqenable->add('ไม่สามารถใช้งานได้',0,'checked','');
    	}
  $selecttypemdeq = new SelectFromDB();
  $selecttypemdeq->name = 'typemdeq_typemdeq_id';
  $selecttypemdeq->lists = 'โปรดระบุ ชนิดของอุปกรณ์';
    $submit = new buttonok('บันทึก','btnSubmit','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();
     if(!empty($_GET['id'])){
	//$r = $db->findByPK('mdeq','mdeq_id',$id)->executeRow();
	//$txtmdeq->value = $r['mdeq_name'];
  if($r["mdeq_enable"] == 1){
    	$radiomdeqenable->add('ใช้งานได้',1,'checked','');
    	$radiomdeqenable->add('ไม่สามารถใช้งานได้',0,'','');
    	}else if($r['mdeq_enable'] == 0){
        $radiomdeqenable->add('ใช้งานได้',1,'','checked');
        $radiomdeqenable->add('ไม่สามารถใช้งานได้',0,'','');
    	}
    }
 ?>
<div class="col-12 card bdadd">
        <div class="row">
                <div class="col-12 pt-3 tx3 card-header">
                        <div class="row">
                                <span class="pl-2 achf">เพิ่มชนิดอุปกรณ์การแพทย์</span>
                        </div>
                </div>
<?php echo $form->open("form_reg","","col-12","insert_mdeq.php",""); ?>
                <div class="col-12">
                        <div class="row">
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                        <?php echo $lbmdeqcode;  ?>
                                                </div>
                                                <div class="w-100 tx2 adeqinp1">
                                                                <?php echo $txtmdeqcode;  ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                        <?php echo $lbtypemdeq;  ?>
                                                </div>
                                                <div class="w-100 tx2 adeqinp2">
                                                        <?php
                                                        $rs =  $db->findAll('typemdeq');
                                                        echo $selecttypemdeq->selectFromTB($rs,'typemdeq_id','typemdeq_name','mdeq_id'); ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                        <?php echo $lbname;  ?>
                                                </div>
                                                <div class="w-100 tx2 adeqinp3">
                                                        <?php echo $txtname;  ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                        <?php echo $lbprice;  ?>
                                                </div>
                                                <div class="w-100 tx2 adeqinp1">
                                                        <?php echo $txtprice;  ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                        <?php echo $lbunit;  ?>
                                                </div>
                                                <div class="w-100 tx2 adeqinp1">
                                                                <?php echo $txtunit;  ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                        <?php echo $lbcomment;  ?>
                                                </div>
                                                <div class="w-100 tx2 adeinp4">
                                                        <?php echo $txtcomment;  ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                </div>
                                                <div class="w-100 tx2 adeinp4">
                                                        <div class="row">
                                                                <?php echo $radiomdeqenable; ?>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-3 mb-3">
                                        <div class="row">
                                                <div class="col-xl-11 col-lg-10 col-md-10 col-9"></div>
                                                <input type="hidden" name="mdeq_date" value="<?php echo date("Y-m-d H:i"); ?>"/>
                                                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>"/>
                                                <div class="col-xl-1 col-lg-2 col-md-2 col-3">
                                                        <div class="row">
                                                                <div class="col-12 pl-0 pr-0">
                                                                            <?php echo $submit; ?>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        <?php echo $form->close(); ?>
        </div>
</div>
<script>
$( "#form_reg" ).validate({
  rules: {
    mdeq_code: "required",
    typemdeq_typemdeq_id: "required",
    mdeq_name: "required",
    mdeq_price: "required",
    mdeq_unit: "required",
    mdeq_enable: "required",
  }
});
 </script>
