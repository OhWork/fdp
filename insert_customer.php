<?php
include "tools/db_tools.php";
include "connect.php";
   $rs = $db->insert('customer',array(
                'customer_name' => $_POST['customer_name'],
                'customer_position' => $_POST['customer_position'],
                'customer_address' => $_POST['customer_address'],
                'customer_shop' => $_POST['customer_shop'],
                'customer_tel' => $_POST['customer_tel'],
                'customer_email' => $_POST['customer_email'],
                'sale_sale_id' => $_POST['sale_sale_id'],
                'customer_subdistricts' => $_POST['customer_subdistricts'],
                'customer_districts' => $_POST['customer_districts'],
                'customer_province' => $_POST['customer_province']
            ) );
   if($rs){
       echo 'have';
   }else{
       echo 'don\'t';
   }
?>