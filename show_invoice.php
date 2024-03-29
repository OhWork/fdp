<script>
$(document).ready(function() {
	$('#Modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "invoice_getdata.php",
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
	$columns = array('order_code','customer_shop','order_date','order_sumshow');
    $form = new form();
     $rs = $db->findByPK(array('`order`,customer'),
    					array(
						'order_status'=>"'Y'",
    					'customer_customer_id'=>"customer_id",
						));

?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card">
        <div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card-header">
                        <div class="row">
                                <div class="">
                                        <span class="pl-2 achf">รายการใบแจ้งหนี้</span>
                                </div>
                        </div>
	</div>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 card-body">
                        <div class="table-responsive">
			<?php
				$grid = new gridView();
				$grid->pr = 'order_id';
				$grid->header = array('<b><center>เลขที่ใบเสนอราคา</center></b>','<b><center>ชื่อร้านค้า</center></b>','<b><center>วันที่ส่ง</center></b>','<b><center>มูลค่า</center></b>','<b><center>#</center></b>');
				$grid->width = array('10%','30%','30%','20%');
                 $grid->view = '#';
				$grid->viewtxt =' รายละเอียด';
				$grid->name = 'table';
				$grid->renderFromDB($columns,$rs);
			?>
                        </div>
	</div>
        </div>
</div>
<?php
	include "invoice_showdetail.php";
	endif;
?>
