<?php
    include 'tools/db_tools.php';
    include 'connect.php';
    $id = $_GET['id'];
 $rs = $db->findByPK(array('`order`,customer'),
    					array(
    					'customer_customer_id'=>"customer_id",
    					'order_id'=>$id
						));
?>

		<div class="modal-body">
    			<!--เพิ่มฝ่ายเพื่อให้ทราบว่าหน่วยงานไหนแจ้งมา-->
		<?php
			while( $row = $rs->moveNext_getRow('assoc')){

			echo "วันที่ต้องส่ง ".$row['order_date']."<br>";
			echo "ชื่อ ".$row['customer_name']."<br>";
			echo "ที่อยู่ ".$row['customer_address']."<br>";
$rs2 = $db->findByPK(array('`order`,orderlist','mdeq'),
    					array(
    					'order_id'=>"order_order_id",
    					'mdeq_mdeq_id'=>"mdeq_id",
    					'order_order_id'=>$id
						));
						while( $row2 = $rs2->moveNext_getRow('assoc')){
			echo "ชื่อสินค้า ".$row2['mdeq_name']."<br>";
			echo "จำนวน ".$row2['orderlist_amourt']."<br>";
}
			echo "ราคาทั้งหมด ".$row['order_sumshow']."<br>";

							}
		?>
		</div>
		<div class="modal-footer">
    			<!--เพิ่มฝ่ายเพื่อให้ทราบว่าหน่วยงานไหนแจ้งมา-->
		<a href="order_report.php?id=<?php echo $id;?>">ใบเสนอราคา</a>
		<a href="invoice_report.php?id=<?php echo $id;?>">ใบแจ้งหนี้</a>
		</div>
