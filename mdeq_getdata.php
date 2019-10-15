<?php
    include 'tools/db_tools.php';
    include 'connect.php';
    $id = $_GET['id'];
    $rs = $db->findByPK(array('mdeq','stock'),array('mdeq_id'=>"mdeq_mdeq_id",'mdeq.mdeq_id'=>$id,));
?>
<div class="modal-body col-12">
        <?php while( $row = $rs->moveNext_getRow('assoc')){ ?>
        <div class="col-12">
                <div class="row">
                        <div class="col-4"><p>รหัสสินค้า</p></div>
                        <div class="col-8"><p><?php echo $row['mdeq_code']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-4"><p>ชื่อสินค้า</p></div>
                        <div class="col-8"><p><?php echo $row['mdeq_name']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-4"><p>จำนวนสินค้าคงเหลือ</p></div>
                        <div class="col-8"><p><?php echo $row['stock_amount']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-4"><p>ราคาต่อหน่วย</p></div>
                        <div class="col-8"><p><?php echo $row['mdeq_price']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-4"><p>หน่วยเป็น</p></div>
                        <div class="col-8"><p><?php echo $row['mdeq_unit']; ?></p></div>
                </div>
        </div>
        <?php } ?>
</div>