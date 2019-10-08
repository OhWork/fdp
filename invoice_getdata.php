<?php
    include 'tools/db_tools.php';
    include 'connect.php';
    $id = $_GET['id'];
 $rs = $db->findByPK(array('`order`,customer','orderlist'),
    					array(
    					'customer_customer_id'=>"customer_id",
    					'order_id'=>"order_order_id",
    					'order_id'=>$id
						));
?>

		<div class="modal-body">
    			<!--เพิ่มฝ่ายเพื่อให้ทราบว่าหน่วยงานไหนแจ้งมา-->
		<?php
			while( $row = $rs->moveNext_getRow('assoc')){

			echo $row['order_id'];

							}
		?>
		</div>
		<div class="modal-footer">
    			<!--เพิ่มฝ่ายเพื่อให้ทราบว่าหน่วยงานไหนแจ้งมา-->
		<a href="order_report.php?id=<?php echo $id;?>">ใบเสนอราคา</a>
		<a href="invoice_report.php?id=<?php echo $id;?>">ใบแจ้งหนี้</a>
		</div>
