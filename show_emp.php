<script>
            $(document).ready(function() {
	            $('#Modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "emp_getdata.php",
                data: dataString,
//                 cache: false,
                success: function (data) {
//                     console.log(data);
                    modal.find('.ct').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });
    });

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
                                        <span class="pl-2 achf">รายชื่อพนักงาน</span>
                                </div>
                                <div class="ml-auto">
                                    <a class="btn btn-link btn-success text-white ml-5" href="main.php?url=add_emp.php">
                                                <i class="fas fa-plus"></i>
                                        </a>
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
				$grid->edit = 'main.php?url=add_emp.php';
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
<?php
	include "emp_showdetail.php";
	endif; ?>
