<div class="card w-100">
        <div class="card-body">
                <div class="table-responsive">
                        <div id="table_wraper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="myTbl" class="table table-hover table-striped table-bordered dataTable" border="1" cellspacing="2" cellpadding="0">
                                        <thead>
                                                <tr>
	                                                	<td>รหัสสินค้า</td>
                                                        <td>ชื่ออุปกรณ์การแพทย์</td>
                                                        <td>จำนวน</td>
                                                        <td>ราคาทุน</td>
                                                        <td>ราคาที่ขาย</td>
                                                </tr>
                                        </thead>
                                        <tbody>
	                                        <?php
												$rs =$db->findByPK(array(
																	'`orderlist`','mdeq','stock'
																  ),array(
																	'orderlist.mdeq_mdeq_id' =>'mdeq_id',
																	'mdeq_id' =>'stock.mdeq_mdeq_id',
																	'order_order_id'=>$id,
																  ));
												while($cols = $r->moveNext_getRow('assoc')){
	                                        ?>
                                                <tr class="firstTr">
	                                                	<td>
		                                                	<?php echo $cols['orderlist_mdeqcode']; ?>
		                                                </td>
                                                        <td>
	                                                    	<?php echo $cols['mdeq_name']; ?>
	                                                    </td>
                                                        <td>
															<?php echo $cols['orderlist_amourt']; ?>
														</td>
                                                        <td>
	                                                        <?php echo $cols['orderlist_cost']; ?>
	                                                    </td>
                                                        <td>
															<?php echo $cols['orderlist_costfake']; ?>
                                                        </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
</div>
