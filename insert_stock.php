<?php
session_start();
include "tools/db_tools.php";
include "connect.php";

error_reporting(0);
if( isset($_SESSION['token']) ){
    if( $_POST['token'] == $_SESSION['token'] ){
   $rs = $db->insert('stock',array(
                'mdeq_mdeq_id' => $_POST['mdeq_id'],
                'stock_date' => $_POST['stock_date'],
                'stock_amount' => $_POST['mdeq_amount'],
            ) );
   }else{
        echo "Error : Token Data not match<br>";
    }//end chk token value
}else{
    echo "Error : No Token";
    echo "ไม่มี",$_SESSION['token'];
}
if ($rs) {
    echo "data inserted";
    $link = "main.php?url=main.php?url=add_stock.php";
        header( "Refresh: 2; $link" );
}
else
{
    echo "failed";
}
?>
