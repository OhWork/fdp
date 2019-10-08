<?php
error_reporting(0);
session_start();
include "tools/db_tools.php";
include "connect.php";
if( isset($_SESSION['token']) ){
    if( $_POST['token'] == $_SESSION['token'] ){
	    if(!empty($_POST['order_id'])){
			$data['order_status'] = $_POST['order_status'];
			$data['order_confirm'] = date("Y-m-d");
					$rsfix = $db->update('`order`', $data, 'order_id', $_POST['order_id']);
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
