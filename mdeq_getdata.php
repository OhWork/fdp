<?php
    include 'tools/db_tools.php';
    include 'connect.php';
    $id = $_GET['id'];
    $rs = $db->findByPK(array('mdeq','stock')
    					,array(
						'mdeq_id'=>"mdeq_mdeq_id",
						'mdeq.mdeq_id'=>$id,
					));
?>

		<div class="modal-body">
    			<!--เพิ่มฝ่ายเพื่อให้ทราบว่าหน่วยงานไหนแจ้งมา-->
		<?php
			while( $row = $rs->moveNext_getRow('assoc')){
			echo "รหัสสินค้า".$row['mdeq_code']."<br>";
			echo "ชื่อสินค้า ".$row['mdeq_name']."<br>";
			echo "จำนวนสินค้าที่มีอยู่ในสต๊อก ".$row['stock_amount']."<br>";
			echo "ราคาต่อหน่วย ".$row['mdeq_price']."<br>";
			echo "หน่วยเป็น ".$row['mdeq_unit']."<br>";
			echo "<hr>";

							}
		?>
		</div>
		<div class="modal-footer">
    			<!--เพิ่มฝ่ายเพื่อให้ทราบว่าหน่วยงานไหนแจ้งมา-->
		</div>
