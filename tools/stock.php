<?php
class checkall{
function checkstock($mdeq_id){
 $rsselctstock = $db->findByPK(array(
										'`stock`'
									),array(
										'mdeq_mdeq_id'=>$mdeq_id
									));
					while($cols = $rsselctstock->moveNext_getRow('assoc')){
						print_r($cols);
						$stock_amont += $cols2['stock_amount'];

					}
}
function checkorderlist($mdeq_id){
 $rsselctorder = $db->findByPK(array(
										'`ordeerlist`'
									),array(
										'mdeq_mdeq_id'=>$mdeq_id
									));
					while($cols2 = $rsselctorder->moveNext_getRow('assoc')){
						rint_r($cols2);
					}
}
}
?>
