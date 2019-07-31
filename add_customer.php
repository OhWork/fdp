<?php
    include 'tools/db_tools.php';
    include 'connect.php';
    $form = new form();
    $lbname = new label('ชื่อ-นามสกุล');
    $lbname = new label('ตำแหน่ง');
    $lbaddress = new label('ที่อยู่');
    $lbshop = new label('ชื่อร้าน');
    $lbtel = new label('เบอร์โทรศัพท์');
    $lbemail = new label('อีเมล');
    $lbsubdistrict = new label('แขวง/ตำบล');
    $lbdistrict = new label('เขต/อำเภอ');
    $lbprovince = new label('อีเมล');
   echo $form->open("","","","insert_customer.php","");
   ?>
   เพิ่มลุกค้า
   