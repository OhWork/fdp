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
    $columns = array('mdeq_code','mdeq_name','mdeq_price','mdeq_unit');
    $form = new form();
    $rs = $db->findAll('mdeq');
                 
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card">
        <div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card-header">
                        <div class="row">
                                <div class="col-11">
                                        <h4>รายการสินค้า</h4>
                                </div>
                                <div class="col-1">
                                    <a class="btn btn-link btn-success text-white ml-5" href="main.php?url=add_mdeq.php">
                                                <i class="fas fa-plus"></i>
                                        </a>
                                </div>
                        </div>
	</div>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 card-body">
			<?php
				$grid = new gridView();
				$grid->pr = 'customer_id';
				$grid->header = array('<b><center>รหัสสินค้า</center></b>','<b><center>ชื่อสินค้า</center></b>','<b><center>ราคา</center></b>','<b><center>หน่วย</center></b>','<b><center>#</center></b>');
				$grid->width = array('5%','20%','10%','10%','5%');
				$grid->edit = 'main.php?url=add_mdeq.php';
				$grid->name = 'table';
				$grid->edittxt ='แก้ไข';
				$grid->renderFromDB($columns,$rs);
			?>
	</div>
        </div>
</div>
<?php endif; ?>
