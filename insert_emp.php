<?php
session_start();
include "tools/db_tools.php";
include "connect.php";
if( isset($_SESSION['token']) ){
    if( $_POST['token'] == $_SESSION['token'] ){
   $rs = $db->insert('emp',array(
                'emp_name' => $_POST['emp_name'],
                'emp_address' => $_POST['emp_address'],
                'emp_tel' => $_POST['emp_tel'],
                'emp_email' => $_POST['emp_email'],
                'sale_sale_id' => $_POST['sale_sale_id'],
                'emp_subdistricts' => $_POST['emp_subdistricts'],
                'emp_districts' => $_POST['emp_districts'],
                'emp_provinces' => $_POST['emp_provinces'],
            ) );
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