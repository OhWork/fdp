<?php
    include 'tools/db_tools.php';
    include 'connect.php';
    $id = $_GET['id'];
    $rs = $db->findByPK(array('emp'),
                                   array(
                                   'emp_id'=>$id));
?>

<div class="modal-body col-12">
        <?php while( $row = $rs->moveNext_getRow('assoc')){ ?>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>ชื่อพนักงาน</p></div>
                        <div class="col-9"><p><?php echo $row['emp_name']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>Email</p></div>
                        <div class="col-9"><p><?php echo $row['emp_email']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>บัตรประชาชน</p></div>
                        <div class="col-9"><p><?php echo $row['emp_idcard']; ?></p></div>
                </div>
        </div>
         <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>เบอร์ติดต่อ</p></div>
                        <div class="col-9"><p><?php echo $row['emp_tel']; ?></p></div>
                </div>
        </div>
         <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>วันเดือนปีเกิด</p></div>
                        <div class="col-9"><p><?php echo $row['emp_bd']; ?></p></div>
                </div>
        </div>
        <?php
         } ?>
</div>
