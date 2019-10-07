<?php
function checkstock ($mdeq_id){
 $rsselctstock = $db->findByPK(array(
										'`stock`'
									),array(
										'mdeq_mdeq_id'=>$mdeq_id
									));
					while($cols = $rsselct->moveNext_getRow('assoc')){

					}
}
function checkorderlist ($mdeq_id){
 $rsselctorder = $db->findByPK(array(
										'`ordeerlist`'
									),array(
										'mdeq_mdeq_id'=>$mdeq_id
									));
					while($cols = $rsselct->moveNext_getRow('assoc')){

					}

?>
