<?php
session_start();
include "tools/db_tools.php";
include "connect.php";
if( isset($_SESSION['token']) ){
    if( $_POST['token'] == $_SESSION['token'] ){
	    echo "<pre>";
    print_r($_POST);
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
