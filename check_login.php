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
		  include_once 'inc_js.php';
		  ?>
	</head>
<?php
	include_once 'tools/db_tools.php';
	include_once 'connect.php';

	$db->findByAttributes('user',array(
		'user_user =' => $_POST['user_user'],
		'user_pass =' => $_POST['user_pass'])
		));
                $db->findByPK(array(
				'subdistricts',
				),array(
                                                                            'districts_id'=>$districts_id,
                                                                            'emp_user =' => $_POST['emp_user'],
                                                                            'emp_pass =' => $_POST['emp_pass'])
                                                                           ));

	$rs = $db->executeRow();
	if($rs){
    	$_SESSION['emp_id'] = $rs['emp_id'];
		$_SESSION['user_name'] = $rs['user_name'];
		?>
		<div class="modal" id="myModal">
		  <div class="modal-dialog">
		    <div class="modal-content">

		      <!-- Modal body -->
		      <div class="modal-body">
		        ยินดีต้อนรับเข้าสู่ระบบ
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
		$log_user = $_SESSION['user_name']." ".$_SESSION['user_last'];
		 //Log
		if(@getenv(HTTP_X_FORWARDED_FOR)){
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; // IP proxy
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $ipshow = gethostbyaddr($ip);
        $log = $db->insert('log',array(
    	'log_system' => 'เข้าระบบ',
    	'log_action' => 'Login',
    	'log_action_date' => $date,
    	'log_action_by' => $log_user,
    	'log_ip' => $ipshow
    	));
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

?>
</html>
