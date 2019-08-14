<script>
            $(document).ready(function() {

                $('#table').DataTable( {
                "ordering": false,
                "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "ทุกหน้า"]],
                "language": {
                    "lengthMenu": "แสดง _MENU_ แถวต่อหน้า",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "info": "แสดงหน้าที่ _PAGE_ ถึง _PAGES_",
                    "infoEmpty": "ไม่พบข้อมูล",
                    "infoFiltered": "(filtered from _MAX_ total records)"
                }
    } );
} );
</script>
<?php
    if (!empty($_SESSION['emp_name'])):
    $columns = array('customer_name','customer_tel');
    $form = new form();
    $rs = $db->findByPK(array(
		'customer'
		),array(
                                                           'emp_emp_id' => "1"
                                                           ));
                 
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
	<div class="row">
		<div class='col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1'></div>
		<div class='col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10'>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h4>รายชื่อลูกค้า</h4>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
			<?php
				$grid = new gridView();
				$grid->pr = 'customer_id';
				$grid->header = array('<b><center>ชื่อ-นามสกุุล</center></b>','<b><center>เบอร์โทรศัพท์</center></b>','<b><center>#</center></b>');
				$grid->width = array('40%','40%','20%');
				$grid->edit = 'main.php?url=add_customer.php';
				$grid->name = 'table';
				$grid->edittxt ='แก้ไข';
				$grid->renderFromDB($columns,$rs);
			?>
			</div>
		</div>
		<div class='col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1'></div>
	</div>
</div>
<?php endif; ?>
