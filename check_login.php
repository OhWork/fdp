<?php
	session_start();
	ob_start();
	date_default_timezone_set('Asia/Bangkok');
	$date = date("Y-m-d H:i");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <link rel="stylesheet" href="CSS/bootstrap.css">
        <link rel="stylesheet" href="CSS/main.css">
          <title>Logining</title>
		  <?php
                error_reporting(0);
	include_once 'inc_js.php';
                include_once 'tools/db_tools.php';
	include_once 'connect.php';
		  ?>
	</head>
<?php
if( isset($_SESSION['token']) ){
    if( $_POST['token'] == $_SESSION['token'] ){
	$empname = $_POST['emp_email'];
                $password = $_POST['emp_password'];

                $db->findByPK(array(
			'emp'
			),array(
                                                           'emp_email' => "'$empname'",
                                                           'emp_password' => "'$password'"
                                                           ));
                 while( $col = $db->moveNext_getRow('assoc')){
                    $_SESSION['emp_name'] =  $col['emp_name'];
                    $_SESSION['emp_permission'] = $col['emp_permission'];
                    $_SESSION['emp_id'] = $col['emp_id'];
         }
	if($_SESSION['emp_name']){
		?>
		<div class="modal" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal body -->
		      <div class="modal-body">
		        ยินดีต้อนรับเข้าสู่ระบบ <?php echo $_SESSION['emp_name']; ?>
		      </div>
		       <div class="modal-footer">
			       <div id="showcountdown"></div>
			       <a href="main.php"><button type="button" class="btn btn-primary">Ok</button></a>
		       </div>
		    </div>
		  </div>
		</div>
		<script>


			$("#myModal").modal({backdrop: 'static', keyboard: false});

			setTimeout(function(){
				window.location.href = 'main.php';
			}, 5000);
			var timeLeft = 4;
			var elem = document.getElementById('showcountdown');
			var timerId = setInterval(countdown, 1000);

			function countdown() {
			    if (timeLeft == -1) {
			        clearTimeout(timerId);
			    } else {
			        elem.innerHTML = timeLeft + ' seconds remaining';
			        timeLeft--;
			    }
			}


		</script>
		<?php
		//header('location: admin_index.php');
		//$log_user = $_SESSION['user_name']." ".$_SESSION['user_last'];
		 //Log
		if(@getenv(HTTP_X_FORWARDED_FOR)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // IP proxy
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $ipshow = gethostbyaddr($ip);
       // $log = $db->insert('log',array(
    //	'log_system' => 'เข้าระบบ',
    //	'log_action' => 'Login',
    //	'log_action_date' => $date,
    //	'log_action_by' => $log_user,
    //	'log_ip' => $ipshow
    //	));
	}else{
		?>
		<script>
			alert('ไอดีหรือรหัสผิดพลาด กรุณาลองใหม่');
			window.location.href = 'index.php';
		</script>
		<?php
		//header('location: admin_index.php');
		$login_confirm = 0;
		echo "<div class='loginwrong'>ไอดีหรือรหัสผิดพลาด กรุณาลองใหม่</div>";
	}
    }else{
        echo "ติดต่อเจ้าหน้าที่";
    }
}
?>
</html>
