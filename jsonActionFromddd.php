<?php
                include 'tools/db_tools.php';
                include 'connect.php';
// Set delay 1 second. 
sleep(1);

$nextList = isset($_GET['nextList']) ? $_GET['nextList'] : '';

switch($nextList) {
	case 'districts':
		$provinces_id = isset($_GET['provinces_id']) ? $_GET['provinces_id'] : '';
                                $db->findByPK(array(
				'districts',
				),array(
                                                                            'provinces_id'=>$provinces_id,
                                                                           ));
		break;
	case 'subdistricts':
		$districts_id = isset($_GET['districts_id']) ? $_GET['districts_id'] : '';
                                $db->findByPK(array(
				'subdistricts',
				),array(
                                                                            'districts_id'=>$districts_id,
                                                                           ));
		break;
}

$data = array();
while($row = $db->moveNext_getRow('assoc')){
			$data[] = $row;
		}


// Print the JSON representation of a value
echo json_encode($data);
?>