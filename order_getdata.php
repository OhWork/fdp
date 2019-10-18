<?php
    include 'tools/db_tools.php';
    include 'connect.php';
    $id = $_GET['id'];
    $rs = $db->findByPK(array('`order`,customer'),
                                   array('customer_customer_id'=>"customer_id",'order_id'=>$id));
?>
<div class="modal-body col-12">
        <?php while( $row = $rs->moveNext_getRow('assoc')){  ?>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>วันที่ต้องส่ง</p></div>
                        <div class="col-9"><p><?php echo $row['order_date']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>ชื่อผู้ติดต่อ</p></div>
                        <div class="col-9"><p><?php echo $row['customer_name']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>ที่อยู่</p></div>
                        <div class="col-9"><p><?php echo $row['customer_address']; ?></p></div>
                </div>
        </div>
        <?php
        $rs2 = $db->findByPK(array('`order`,orderlist','mdeq'),
    			array('order_id'=>"order_order_id",'mdeq_mdeq_id'=>"mdeq_id",'order_order_id'=>$id));
			while( $row2 = $rs2->moveNext_getRow('assoc')){ ?>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>ชื่อสินค้า</p></div>
                        <div class="col-9"><p><?php echo $row2['mdeq_name']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>จำนวน</p></div>
                        <div class="col-9"><p><?php echo $row2['orderlist_amourt']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>ราคาทั้งหมด</p></div>
                        <div class="col-9"><p><?php echo $row['order_sumshow']; ?></p></div>
                </div>
        </div>
        <?php } } ?>
</div>
<div class="modal-footer">
    <a class="btn btn-info" href="order_report_f.php?id=<?php echo $id;?>"><i class="fas fa-clipboard-list mr-1"></i><span>ใบเสนอราคา</span></a>
</div>
