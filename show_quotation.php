<script>
            $(document).ready(function() {
	$('#Modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;
            $.ajax({
                type: "GET",
                url: "order_getdata.php",
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
    $form = new form();
    $rs = $db->findByPK(array('`order`,`orderlist`,`mdeq`,`customer`,`stock`'),
    					array(
    							'order.order_id'=>"orderlist.order_order_id",
    							'orderlist.mdeq_mdeq_id'=>"mdeq.mdeq_id",
    							'stock.mdeq_mdeq_id'=>"mdeq.mdeq_id",
    							'order.customer_customer_id'=>"customer.customer_id",
						));


?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card">
        <div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card-header">
                        <div class="row">
                                <div class="">
                                        <span class="pl-2 achf">รายการใบเสนอราคา</span>
                                </div>
                                <div class="ml-auto">
                                        <a class="btn btn-link btn-success text-white ml-5" href="main.php?url=add_order.php">
                                                <i class="fas fa-plus"></i>
                                        </a>
                                </div>
                        </div>
	</div>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 card-body">
                        <div class="table-responsive">
			<?php
				if($_SESSION['emp_permission'] == 0){

				$columns = array('order_code','customer_shop','order_date','order_sumshow','stock_amount','order_status');
				$grid = new gridView();
				$grid->pr = 'order_id';
				$grid->header = array('<b><center>เลขที่ใบเสนอราคา</center></b>','<b><center>ชื่อร้านค้า</center></b>','<b><center>วันที่ส่ง</center></b>','<b><center>มูลค่า</center></b>','<b><center>#</center></b>','<b><center>สถานะ</center></b>','<b><center>#</center></b>');
				$grid->width = array('10%','30%','10%','10%','10%','10%','20%');
				$grid->edit = 'main.php?url=edit_order.php';
				$grid->name = 'table';
				$grid->edittxt ='เปลี่ยนสถานะใบเสนอราคา';
				$grid->renderFromDB($columns,$rs);
				}
				else{

    $columns = array('order_code','customer_shop','order_date','order_sumshow','order_status');
				$grid = new gridView();
				$grid->pr = 'order_id';
				$grid->header = array('<b><center>เลขที่ใบเสนอราคา</center></b>','<b><center>ชื่อร้านค้า</center></b>','<b><center>วันที่ส่ง</center></b>','<b><center>มูลค่า</center></b>','<b><center>สถานะ</center></b>','<b><center>#</center></b>');
				$grid->width = array('10%','30%','20%','10%','10%','10%');
                 $grid->view = '#';
				$grid->viewtxt =' รายละเอียด';
				$grid->name = 'table';
				$grid->renderFromDB($columns,$rs);
				}
			?>
                        </div>
	</div>
        </div>
</div>
<?php
	include "order_showdetail.php";
	endif;
?>
