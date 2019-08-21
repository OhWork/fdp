<?php
    include "tools/ddd.php";
    $form = new form();
    $lbname = new label('ชื่ออุปกรณ์การแพทย์');
    $lbunit= new label('หน่วย');
    $lbprice = new label('ราคา'); 
    $lbcomment = new label('หมายเหตุ');
    $lbtypemdeq = new label('ชนิดอุปกรณ์การแพทย์');
    $txtname = new textfield('mdeq_name','','form-control','','');
    $txtprice = new textfield('mdeq_price','','form-control','','');
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
        $radiomdeqenable->add('ใช้งานได้',1,'','');
        $radiomdeqenable->add('ไม่สามารถใช้งานได้',0,'checked','');
    	}
    }
 ?>
<div class="col-12">
        <div class="row">
                <div class="col-xl-3 col-lg-2 col-md-2 col-xs-1"></div>
                <div class="col-xl-6 col-lg-8 col-md-8 col-xs-10 col-12 bg-dark bdac1">
                        <div class="row">
                                <div class="col-12 pt-3 tx3">
                                        <div class="row">
                                            <h2 class="pl-3">เพิ่มชนิดอุปกรณ์การแพทย์</h2>
                                        </div>
                                </div>
<?php echo $form->open("","","col-12","insert_typemdeq.php",""); ?>
                                        <div class="col-12 mt-4 tx2">
                                                <?php echo $lbtypemdeq;  ?>
                                        </div>
                                        <div class="col-12">
                                                <?php
                                                $rs =  $db->findAll('typemdeq');
                                                echo $selecttypemdeq->selectFromTB($rs,'typemdeq_id','typemdeq_name','mdeq_id'); ?>
                                        </div>
                                        <div class="col-12 mt-2 tx2">
                                                <?php echo $lbname;  ?>
                                        </div>
                                        <div class="col-12">
                                                <?php echo $txtname;  ?>
                                        </div>
                                        <div class="col-12 mt-2 tx2">
                                                <?php echo $lbprice;  ?>
                                        </div>
                                        <div class="col-12">
                                                <?php echo $txtprice;  ?>
                                        </div>
                                        <div class="col-12 mt-3 tx2">
                                            <div class="row">
                                                <?php echo $radiomdeqenable; ?>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-3 mb-3">
                                                <div class="row">
                                                        <div class="col-9"></div>
                                                        <input type="hidden" name="mdeq_date" value="<?php echo date("Y-m-d H:i"); ?>"/>
                                                        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>"/>
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