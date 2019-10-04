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
						echo $_POST['order_id'];
						$rsfixstock = $db->findByPK(array(
										'`stock`','`mdeq`','orderlist','`order`'
									),array(
										'stock.mdeq_mdeq_id'=>'mdeq.mdeq_id',
										'orderlist.mdeq_mdeq_id'=>'mdeq.mdeq_id',
										'orderlist.order_order_id' => 'order.order_id',
										'order_order_id'=>$_POST['order_id'],
									));
									while($cols2 = $rsfixstock->moveNext_getRow('assoc')){
										if($cols2['order_status'] == 'Y'){
											echo "<pre>";
											print_r($cols2);
											$stock_amount = $cols2['stock_amount'];
											echo $stock_amount ."<br>";
											$orderlist_amourt = $cols2['orderlist_amourt'];

											echo $orderlist_amourt ."<br>";
											$total = $stock_amount - $orderlist_amourt;

											echo $total ."<br>";

											$data2['stock_amount'] = $total;
											print_r($data2);

																						/*
											$rsfix2 = $db->update('stock', $data2, 'stock_id', $cols2['stock_id']);
*/
										}
									}
									if($rsfix2){ echo "Suscess";}

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
?>
