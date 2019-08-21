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
    $submit = new buttonok('บันทึก ลูกค้า','btnSubmit','btn btn-success col-12','');
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
                        <?php echo $lbtypemdeq;  ?>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                        <?php
                        $rs =  $db->findAll('typemdeq');
                        echo $selecttypemdeq->selectFromTB($rs,'typemdeq_id','typemdeq_name','mdeq_id'); ?>
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
                    <input type="hidden" name="mdeq_date" value="<?php echo date("Y-m-d H:i"); ?>"/>
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>"/>
                    <div class="col-6">
                        <?php echo $radiomdeqenable; ?>
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