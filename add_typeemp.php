<?php
        if (!empty($_SESSION['user_name'])):
        $form = new form();
        $lbname = new label("เพิ่มประเภทพนักงาน :");
        $txtname = new textfield('typeemp_name','','form-control','');
        $button = new buttonok('บันทึก','','btn btn-success col-md-12','');
		if(!empty($_GET['id'])){
			$id=$_GET['id'];
			$r = $db->findByPK(array('emp'),array('emp_id'=>$id));
			while($cols = $r->moveNext_getRow('assoc')){
				$txtname->value = $cols['emp_name'];
		    }
   }
        echo $form->open('','','typetoolbox col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3','insert_typeemp.php',''); ?>
<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
	<div class='row'>
		<div class='col-xl-3 col-lg-3 col-md-2 col-sm-3 col-2'></div>
			<div class='col-xl-6 col-lg-6 col-md-8 col-sm-12 col-12 csborder' style="padding-bottom:16px;">
				<div class='row'>
					<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="padding-top:16px;">
						<h4>เพิ่มประเภทพนักงาน</h4>
						<hr></hr>
					</div>
					<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12' style="padding-bottom:16px;">
						<div class='row'>
							<div class='col-xl-2 col-lg-3 col-md-3 col-sm-3 col-4'style='padding-top: 8px;'><center><?php echo $lbname ?></center></div>
							<div class='col-xl-10 col-lg-9 col-md-9 col-sm-9 col-8'><?php echo $txtname ?></div>
						</div>
					</div>
					<div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
						<div class='row'>
							<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4'></div>
							<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4'><?php echo $button ?></div>
							<div class='col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4'></div>
						</div>
					</div>
				</div>
			</div>
		<div class='col-xl-3 col-lg-3 col-md-2 col-sm-3 col-2'></div>
	</div>
</div>
<?php echo $form->close();
        endif;
        ?>
        <script>
jQuery.validator.setDefaults({
  debug: true,
  success: "valid"
});
$( "#form_reg" ).validate({
  rules: {
    typeemp_name: "required",
  }
});
        </script>
