<?php
session_start();
include "tools/db_tools.php";
include "connect.php";
if( isset($_SESSION['token']) ){
    if( $_POST['token'] == $_SESSION['token'] ){
	    echo "<pre>";
		print_r($_POST);
		echo "<pre>";
		$rs = $db->insert("order",array(
                'customer_customer_id' => $_POST['customer_customer_id'],
                'order_date' => $_POST['order_date'],
                'order_dateexp' => $_POST['order_dateexp'],
                'order_comment' => $_POST['order_comment'],
//                 'order_ref' => $_POST['fakeprice'],
                'order_status' => 'NY',  // ใช้อะไรกันแน่ ?
                ));
        if($rs){
	        $rsselct = $db->findByPK(array(
										'`order`'
									),array(
										'customer_customer_id'=>1,
									));
					while($cols = $rsselct->moveNext_getRow('assoc')){
							print_r($cols);
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
