<?php
    include 'tools/db_tools.php';
    include 'connect.php';
    $id = $_GET['id'];
    $rs = $db->findByPK(array('customer','provinces','districts','subdistricts'),
                                   array(
	                               'customer_provinces'=>'provinces.provinces_id',
	                               'customer_districts'=>'districts.districts_id',
	                               'customer_subdistricts'=>'subdistricts.subdistricts_id',
                                   'customer_id'=>$id));
?>

<div class="modal-body col-12">
        <?php while( $row = $rs->moveNext_getRow('assoc')){  ?>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>ชื่อพนักงาน</p></div>
                        <div class="col-9"><p><?php echo $row['customer_name']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>Email</p></div>
                        <div class="col-9"><p><?php echo $row['customer_email']; ?></p></div>
                </div>
        </div>
        <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>ร้านค้าที่ดูแล</p></div>
                        <div class="col-9"><p><?php echo $row['customer_shop']; ?></p></div>
                </div>
        </div>
         <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>ที่อยู่</p></div>
                        <div class="col-9">
							<div class="row">
		                        	<p><?php echo $row['customer_address']; ?></p>
			                        <p><?php echo $row['customer_address']; ?></p>
			                        <p>ตำบล</p>
			                        <p><?php echo $row['subdistricts_name']; ?></p>
			                        <p>อำเภอ</p>
			                        <p><?php echo $row['districts_name']; ?></p>
			                        <p>จังหวัด</p>
			                        <p><?php echo $row['provinces_name']; ?></p></div>
			                    </div>
                        </div>
                </div>
        </div>
         <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>เบอร์ติดต่อ</p></div>
                        <div class="col-9"><p><?php echo $row['customer_tel']; ?></p></div>
                </div>
        </div>
         <div class="col-12">
                <div class="row">
                        <div class="col-3"><p>ตำแหน่ง</p></div>
                        <div class="col-9"><p><?php echo $row['customer_position']; ?></p></div>
                </div>
        </div>
        <?php
         } ?>
</div>
