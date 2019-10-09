<?php
    $form = new form();
     $lbcode = new label('รหัสอุปกรณ์การแพทย์');
    $lbname = new label('ชื่ออุปกรณ์การแพทย์');
    $lbamount = new label('จำนวน');
    $txtname = new textfieldreadonly('mdeq_name','mdeq_name','','','');
    $txtcode = new textfield('mdeq_code','mdeq_code','form-control','','');
    $txtamount = new textfield('mdeq_amount','','form-control','','');
    $submit = new buttonok('บันทึก','btnSubmit','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();
     if(!empty($_GET['id'])){
	//$r = $db->findByPK('mdeq','mdeq_id',$id)->executeRow();
	//$txtmdeq->value = $r['mdeq_name'];
    }
?>
<div class="col-12 card bdadd">
        <div class="row">
                <div class="col-12 pt-3 tx3 card-header">
                        <div class="row">
                                <span class="pl-2 achf">เพิ่มจำนวนสินค้า</span>
                        </div>
                </div>
<?php   echo $form->open("","","col-12","insert_stock.php",""); ?>
                <div class="col-12">
                        <div class="row">
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                        <?php echo $lbcode;  ?>
                                                </div>
                                                <div class="w-100 tx2 adeqinp3">
                                                        <?php echo $txtcode; ?>
                                                </div>
                                        </div>
                                </div>
                            <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                        <?php echo $lbname;  ?>
                                                </div>
                                                <div class="w-100 tx2 adeqinp4">
                                                        <?php echo $txtname; ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 pt-1 tx2 adeqtext">
                                                        <?php echo $lbamount;  ?>
                                                </div>
                                                <div class="w-100 tx2 adeqinp1">
                                                        <?php echo $txtamount; ?>
                                                </div>
                                        </div>
                                </div>
                                 <div class="col-12 mt-3 mb-3">
                                        <div class="row">
                                                <div class="col-xl-11 col-lg-10 col-md-10 col-9"></div>
                                                <input type="hidden" name="stock_date" value="<?php echo date("Y-m-d"); ?>"/>
                                                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>"/>
                                                <input type="hidden" name="mdeq_id" id="mdeq_id" value=""/>
                                                <div class="col-xl-1 col-lg-2 col-md-2 col-3">
                                                        <div class="row">
                                                                <div class="col-12 pl-0 pr-0">
                                                                        <?php echo $submit; ?>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                         </div>
                </div>
        <?php echo $form->close(); ?>
        </div>
</div>
<script>
 $(function() {

        $( "#mdeq_code" ).autocomplete({ // ใช้งาน autocomplete กับ input text id=tags
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
              console.log( ui.item ?
                  "Selected: " + ui.item.label :
                  "Nothing selected, input was " + this.value);
                $("#mdeq_name").val(ui.item.name); // เก็บ id ไว้ใน hiden element ไว้นำค่าไปใช้งาน
				$("#mdeq_id").val(ui.item.id);
                //setTimeout(function(){
                 // $("#h_input_q").parents("form").submit(); // เมื่อเลือกรายการแล้วให้ส่งค่าฟอร์ม ทันที
           //},500);
            }
        });

                $(".showAll_btn").click(function(){
            // ตรวจสอบถ้ามีการแสดงรายการทั้งหมดอยู่แล้ว
            if ($( "#mdeq_code" ).autocomplete( "widget" ).is( ":visible" ) ) {
                $( "#mdeq_code" ).autocomplete( "close" ); // ปิดการแสดงรายการทั้งหมด
                return;
            }
            // ส่งค่าว่างปล่าวไปทำการค้นหา จะได้ผลลัพธ์เป็นรายการทั้งหมด
            $( "#mdeq_code" ).autocomplete( "search", "" );

            $( "#mdeq_code" ).focus(); //ให้ cursor ไปอยู่ที่ input text id=tags
        });
         });
$( "#form_reg" ).validate({
  rules: {
    mdeq_name: "required",
    mdeq_amount: "required",
  }
});
        </script>
