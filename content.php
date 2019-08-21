
<?php
session_start();
	@$url = $_GET['url'];
                if(empty($_SESSION['emp_name'])){
		include_once 'login.php';
	}else if(!empty($url)){
                    include_once $url;
                 }else{
                      include_once 'main.php';
                 }

?>
