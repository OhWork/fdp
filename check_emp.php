<?php
	include 'tools/db_tools.php';
	include 'connect.php';
                 $db->findByPK(array(
				'emp',
				),array(
                                                                            'emp_email'=>"choatchaw@gmail.com",
                                                                           ));
                 $countuser = $db->moveNext_getRow('num');
	 
                 echo $countuser['emp_email'];


?>
