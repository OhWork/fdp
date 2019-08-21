<?php
    $form = new form();
    $lbname = new label('ชื่ออุปกรณ์การแพทย์');
    $lbamount = new label('จำนวน');
    $txtname = new textfield('mdeq_name','mdeq_name','form-control','','');
    $txtamount = new textfield('mdeq_amount','','form-control','','');
    $submit = new buttonok('บันทึก ลูกค้า','btnSubmit','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();
     if(!empty($_GET['id'])){
	//$r = $db->findByPK('mdeq','mdeq_id',$id)->executeRow();
	//$txtmdeq->value = $r['mdeq_name'];
    }
   echo $form->open("","","col-12","insert_typemdeq.php","");
   ?>
<div class="row">
    <div class="col-3"></div>
    <div class="col-6 mt-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h3>เพิ่มจำนวนสินค้า</h3>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="row">
                        <?php echo $lbname;  ?>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                        <?php echo $txtname; ?>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="row">
                        <?php echo $lbamount;  ?>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                        <?php echo $txtamount; ?>
                </div>
            </div>

 

            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-6"></div>
                    <input type="hidden" name="stock_date" value="<?php echo date("Y-m-d"); ?>"/>
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>"/>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-12 pr-0">
                                <?php echo $submit; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3"></div>
</div>
<script>
 $(function() {

        $( "#mdeq_name" ).autocomplete({ // ใช้งาน autocomplete กับ input text id=tags
            minLength: 0, // กำหนดค่าสำหรับค้นหาอย่างน้อยเป็น 0 สำหรับใช้กับปุ่ใแสดงทั้งหมด
            source: "get_mdeq.php", // กำหนดให้ใช้ค่าจากการค้นหาในฐานข้อมูล
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
                $("#ipzpo_address").val(ui.item.id); // เก็บ id ไว้ใน hiden element ไว้นำค่าไปใช้งาน
                //setTimeout(function(){
                 // $("#h_input_q").parents("form").submit(); // เมื่อเลือกรายการแล้วให้ส่งค่าฟอร์ม ทันที
           //},500);
            }
        });
        
                $(".showAll_btn").click(function(){
            // ตรวจสอบถ้ามีการแสดงรายการทั้งหมดอยู่แล้ว
            if ($( "#mdeq_name" ).autocomplete( "widget" ).is( ":visible" ) ) {
                $( "#mdeq_name" ).autocomplete( "close" ); // ปิดการแสดงรายการทั้งหมด
                return;
            }
            // ส่งค่าว่างปล่าวไปทำการค้นหา จะได้ผลลัพธ์เป็นรายการทั้งหมด
            $( "#mdeq_name" ).autocomplete( "search", "" );

            $( "#mdeq_name" ).focus(); //ให้ cursor ไปอยู่ที่ input text id=tags
        });
        </script>