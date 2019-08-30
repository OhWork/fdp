<?php
    $form = new form();
    $lbnamecustomer = new label('ลูกค้า');
    $lbnamessale = new label('ผู้ออก');
    $lbdate = new label('วันที่สั่ง');
    $lbaddress = new label('ที่อยู่');
    $lbtel = new label('เบอร์โทรศัพท์');
    $lbdateexp = new label('หมดอายุ');
    $lbocode = new label('เอกสารเลขที่');
    $lbcomment = new label('หมายเหตุ');
    $txtnamecustomer = new textfield('customer_customer_id','customer_name','form-control','','');
    $txtaddress = new textfieldreadonly('', 'customer_address', '');
   $txttel = new textfieldreadonly('', 'customer_tel', '');
   $txtdate = new textfield('order_date','','form-control','','');
    $txtdateexp = new textfield('order_dateexp','','form-control','','');
    $txtocode = new textfield('order_code','','form-control','','');
    $txtcomment = new textArea('order_comment', '', '', '', 3, 2,' ');
    $submit = new buttonok('บันทึก','btnSubmit','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();

   echo $form->open("","","col-12","??.php","");
   echo $lbnamecustomer,$txtnamecustomer;
   echo $lbdate,$txtdate;
   echo $lbdateexp,$txtdateexp;
   echo $lbocode,$txtocode;
   echo $lbaddress,$txtaddress ;
   echo $lbtel,$txttel;
   include 'add_orderlist.php';
   echo $lbcomment,$txtcomment;
   echo $submit;
    echo $form->close();
    ?>


<script>
 $(function() {

        $( "#customer_name" ).autocomplete({ // ใช้งาน autocomplete กับ input text id=tags
            minLength: 0, // กำหนดค่าสำหรับค้นหาอย่างน้อยเป็น 0 สำหรับใช้กับปุ่ใแสดงทั้งหมด
            source: "get_customer.php", // กำหนดให้ใช้ค่าจากการค้นหาในฐานข้อมูล
            open:function(){ // เมื่อมีการแสดงรายการ autocomplete
                var valInput=$(this).val(); // ดึงค่าจาก text box id=tags มาเก็บที่ตัวแปร
                if(valInput!=""){ // ถ้าไม่ใช่ค่าว่าง
                    $(".ui-menu-item a").each(function(){ // วนลูปเรียกดูค่าทั้งหมดใน รายการ autocomplete
                        var matcher = new RegExp("("+valInput+")", "ig" ); // ตรวจสอบค่าที่ตรงกันในแต่ละรายการ กับคำค้นหา
                        var s=$(this).text();
                        var newText=s.replace(matcher, "<b>$1</b>");    //      แทนค่าที่ตรงกันเป็นตัวหนา
                        $(this).html(newText); // แสดงรายการ autocomplete หลังจากปรับรูปแบบแล้ว
                    });
                }
            },
            select: function( event, ui ) {
                // สำหรับทดสอบแสดงค่า เมื่อเลือกรายการ
              //console.log( ui.item ?
               //   "Selected: " + ui.item.label :
                //  "Nothing selected, input was " + this.value);
                $("#customer_address").val(ui.item.id); // เก็บ id ไว้ใน hiden element ไว้นำค่าไปใช้งาน
                $("#customer_tel").val(ui.item.id);
                //setTimeout(function(){
                 // $("#h_input_q").parents("form").submit(); // เมื่อเลือกรายการแล้วให้ส่งค่าฟอร์ม ทันที
           //},500);
            }
        });

                $(".showAll_btn").click(function(){
            // ตรวจสอบถ้ามีการแสดงรายการทั้งหมดอยู่แล้ว
            if ($( "#customer_name" ).autocomplete( "widget" ).is( ":visible" ) ) {
                $( "#customer_name" ).autocomplete( "close" ); // ปิดการแสดงรายการทั้งหมด
                return;
            }
            // ส่งค่าว่างปล่าวไปทำการค้นหา จะได้ผลลัพธ์เป็นรายการทั้งหมด
            $( "#customer_name" ).autocomplete( "search", "" );

            $( "#customer_name" ).focus(); //ให้ cursor ไปอยู่ที่ input text id=tags
        });
         });
        </script>

