<?php
error_reporting(0);
session_start();
include "tools/db_tools.php";
include "connect.php";
if( isset($_SESSION['token']) ){
    if( $_POST['token'] == $_SESSION['token'] ){
	    if(!empty($_POST['order_id'])){
			$data['order_status'] = $_POST['order_status'];
					$rsfix = $db->update('`order`', $data, 'order_id', $_POST['order_id']);
					if($rsfix){
/*
						$rsfixstock = $db->findByPK(array(
										'`stock`','`mdeq`','orderlist','`order`'
									),array(
										'stock.mdeq_mdeq_id'=>'mdeq.mdeq_id',
										'orderlist.mdeq_mdeq_id'=>'mdeq.mdeq_id',
										'orderlist.order_order_id' => 'order.order_id',
										'order_order_id'=>$_POST['order_id'],
									));
*/
									$idorder = $_POST["order_id"];
									echo $idorder;
									$rsfixstock = $db->conditions('stock JOIN mdeq ON stock.mdeq_mdeq_id = mdeq.mdeq_id JOIN orderlist ON orderlist.mdeq_mdeq_id  = mdeq.mdeq_id JOIN `order` ON orderlist.order_order_id = order.order_id',"order_order_id = $idorder");
									while($cols2 = $rsfixstock->moveNext_getRow('assoc')){
										if($cols2['order_status'] == 'Y'){
											$stock_amount = $cols2['stock_amount'];
											$orderlist_amourt = $cols2['orderlist_amourt'];
											$total = $stock_amount - $orderlist_amourt;
											$data2['stock_amount'] = $total;
											echo $total."<br>";
											echo "<pre>";
											print_r($cols2);
										}
									}
									$rsfix2 = $db->update('stock', $data2, 'stock_id', $cols2['stock_id']);
											echo "<pre>";
											print_r($rsfix2);

					}
		}

    }else{
        echo "Error : Token Data not match<br>";
    }//end chk token value

}else{
    echo "Error : No Token";
    echo "ไม่มี",$_SESSION['token'];
}
   if($rs){
       echo 'have';
   }else{
       echo 'don\'t';
   }
//    $rsfixstock = $db->conditions('stock JOIN mdeq ON stock.mdeq_mdeq_id = mdeq.mdeq_id JOIN orderlist ON orderlist.mdeq_mdeq_id  = mdeq.mdeq_id JOIN `order` ON orderlist.order_order_id = order.order_id',"order_order_id'= $_POST['order_id']");
// สร้าง Function เพื่อเช็คยอด โดยการ ดึง Orderlist มาSum และ Stock มา Sum เผื่อ ดูว่าตอนนี้ยอดมันเกินในสต๊อกหรือเปล่า
?>
