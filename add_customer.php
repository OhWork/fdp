<?php
    include 'tools/db_tools.php';
    include 'connect.php';
    $form = new form();
    $lbname = new label('ชื่อ-นามสกุล');
    $lbposition = new label('ตำแหน่ง');
    $lbaddress = new label('ที่อยู่');
    $lbshop = new label('ชื่อร้าน');
    $lbtel = new label('เบอร์โทรศัพท์');
    $lbemail = new label('อีเมล');
    $lbsubdistrict = new label('แขวง/ตำบล');
    $lbdistrict = new label('เขต/อำเภอ');
    $lbprovince = new label('อีเมล');
    $txtname = new textfield('customer_name','','','','');
    $txtposition = new textfield('customer_position','','','','');
    $txtaddress = new textfield('customer_address','','','','');
    $txtshop = new textfield('customer_shop','','','','');
    $txttel = new textfield('customer_tel','','','','');
    $txtemail = new textfield('customer_email','','','','');
    $txtsubdistrict = new textfield('customer_subdistrict','','','','');
    $txtdistrict = new textfield('customer_district','','','','');
    $txtprovince = new textfield('customer_province','','','','');
   echo $form->open("","","","insert_customer.php","");
   ?>
   เพิ่มลุกค้า
   