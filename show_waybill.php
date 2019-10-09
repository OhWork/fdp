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
    $columns = array('emp_code','emp_name','emp_tel');
    $form = new form();
    $rs = $db->findAll('emp');
                 
?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card">
        <div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card-header">
                        <div class="row">
                                <div class="">
                                        <span class="pl-2 achf">รายใบส่งของ</span>
                                </div>
                        </div>
	</div>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 card-body">
                        <div class="table-responsive">
			<?php
				$grid = new gridView();
				$grid->pr = 'emp_id';
				$grid->header = array('<b><center>รหัสพนักงาน</center></b>','<b><center>ชื่อ-นามสกุุล</center></b>','<b><center>เบอร์โทรศัพท์</center></b>','<b><center>#</center></b>','<b><center>#</center></b>');
				$grid->width = array('10%','30%','30%','20%','10%');
				$grid->edit = 'main.php?url=add_customer.php';
                                                                $grid->view = '#';
				$grid->viewtxt =' รายละเอียด';
				$grid->name = 'table';
				$grid->edittxt ='แก้ไข';
				$grid->renderFromDB($columns,$rs);
			?>
                        </div>
	</div>
        </div>
</div>
<?php endif; ?>