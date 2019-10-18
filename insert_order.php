<?php
error_reporting(0);
session_start();
include "tools/db_tools.php";
include "connect.php";
if( isset($_SESSION['token']) ){
    if( $_POST['token'] == $_SESSION['token'] ){
	    $datetime = $_POST['order_date'];
		$rs = $db->insert("`order`",array(
                'customer_customer_id' => $_POST['customer_id'],
                'order_date' => $_POST['order_date'],
                'order_dateexp' => $_POST['order_dateexp'],
                'order_comment' => $_POST['order_comment'],
                'order_code' => $_POST['order_code'],
                'order_status' => 'W',
                'order_sumshow'=> $_POST['sumprice']
                ));
        if(@$rs){
	       	        $rsselct = $db->findByPK(array(
										'`order`'
									),array(
										'customer_customer_id'=>$_POST['customer_id'],
										'order_date'=>"'$datetime'",
									));
					while($cols = $rsselct->moveNext_getRow('assoc')){
							for($i = 0 ; $i <sizeof($_POST['field']); $i++){
								$rsorderilst = $db->insert('orderlist',array(
					                'orderlist_mdeqcode' => $_POST['field'][$i]['mdeqcode'],
					                'orderlist_amourt' => $_POST['field'][$i]['num'],
					                'orderlist_cost' => $_POST['field'][$i]['price'],
					                'orderlist_costfake' => $_POST['field'][$i]['fakeprice'],
					                'mdeq_mdeq_id' => $_POST['field'][$i]['mdeqid'],
					                'order_order_id' =>$cols['order_id']
								) );
							}
					}
		}

    }else{
        echo "Error : Token Data not match<br>";
    }//end chk token value

}else{
    echo "Error : No Token";
    echo "ไม่มี",$_SESSION['token'];
}
   if($rs && $rsselct){
       echo 'have';
        $link = "main.php?url=main.php?url=show_quotation.php";
        header( "Refresh: 2; $link" );
   }else{
       echo 'don\'t';
   }
?>
