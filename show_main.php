<script>
$(document).ready(function() {
/*
	$('tr').on('click', function (e) {
		console.log(e);
*/
	$('#Modal2').on('show.bs.modal', function (event) {
	    console.log(event);
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('href') // Extract info from data-* attributes
          console.log(button);
          var modal = $(this);
          var dataString = 'id=' + recipient;
		  	console.log(dataString);
            $.ajax({
                type: "GET",
                url: "mdeq_getdata.php",
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
//     });

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
/*

*/
} );
</script>
<?php
    if (!empty($_SESSION['emp_name'])):
    $columns = array('mdeq_code','mdeq_name','stock_amount');
    $form = new form();
    $rs = $db->findByPK(array('mdeq','stock')
    					,array(
						'mdeq_id'=>"mdeq_mdeq_id",
					));

?>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card">
        <div class="row">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 card-header">
                        <div class="row">
                                <div class="">
                                        <span class="pl-2 achf">รายการสินค้า</span>
                                </div>
                        </div>
	</div>
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 card-body">
			<?php
				$grid = new gridView();
				$grid->pr = 'mdeq_id';
				$grid->header = array('<b><center>รหัสสินค้า</center></b>','<b><center>ชื่อสินค้า</center></b>','<b><center>จำนวนคงเหลือ</center></b>');
				$grid->width = array('20%','40%','10%','10%','10%','10%');
				$grid->name = 'table';
				$grid->renderFromDB($columns,$rs);
			?>
	</div>
        </div>
</div>
<?php
	include 'mdeq_viewdetail.php';
	endif;
?>
