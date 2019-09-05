<?php
session_start();
include "tools/db_tools.php";
include "connect.php";
if( isset($_SESSION['token']) ){
    if( $_POST['token'] == $_SESSION['token'] ){
   $rs = $db->insert('mdeq',array(
                'mdeq_code' => $_POST['mdeq_code'],
                'mdeq_name' => $_POST['mdeq_name'],
                'mdeq_price' => $_POST['mdeq_price'],
                'mdeq_unit' => $_POST['mdeq_unit'],
                'mdeq_enable' => $_POST['mdeq_enable'],
       'typemdeq_typemdeq_id' => $_POST['typemdeq_typemdeq_id'],
       'mdeq_date' => $_POST['mdeq_date'],
       'mdeq_comment' => $_POST['mdeq_comment'],
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
}
else 
{
    echo "failed";
}
?>
