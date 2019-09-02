<div style="margin:auto;">
<table id="myTbl" border="1" cellspacing="2" cellpadding="0">
    <tr>
    <th>เพิ่ม</th>
    <th>รหัสสินค้า</th>
    <th>อุปกรณ์การแพทย์</th>
    <th>จำนวน</th>
    <th>ราคา</th>
    <th>ราคาปลอม</th>
    <th>ลบ</th>
    </tr>
  <tr class="firstTr">
    <td>
    <button id="addRow" type="button"><i class="fas fa-plus"></i></button>
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="field[1][code]" id="mdeqcode" />
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="field[1][name]" id="name" />
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="field[1][num]" id="num" />
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="field[1][price]" id="price" />
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="field[1][fakeprice]" id="fakeprice" />
    <input type="text" class="text_data inputautofill" name="field[1][mdeqid]" id="mdeqid" />
    </td>
       <td>
            <button id="removeRow" type="button"><i class="fas fa-minus"></i></button>
    </td>
    </tr>
</table>
<br />
<table width="" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
<!--     <input type="submit" name="Submit" id="Submit" value="Submit" /></td> -->
  </tr>
</table>



<br />
</div>
<!--
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
-->
<script type="text/javascript">
$(function(){
	var i = 0;
    $("#addRow").click(function(){
        // ส่วนของการ clone ข้อมูลด้วย jquery clone() ค่า true คือ
        // การกำหนดให้ ไม่ต้องมีการ ดึงข้อมูลจากค่าเดิมมาใช้งาน
        // รีเซ้ตเป็นค่าว่าง ถ้ามีข้อมูลอยู่แล้ว ทั้ง select หรือ input
        $(".firstTr:eq(0)").clone(true)
        .find("input").attr("value","").end()
        .find("select").attr("value","").end()
        .appendTo($("#myTbl"));
        console.log($(".firstTr:eq(0)").children().children());
        var lastIndex=$(".inputautofill").size()-1; // หา index ของตัว input ล่าสุด
        // สร้าง input element เพื่อที่จะไปแทนที่ตัวเก่า
        $($(".inputautofill:eq("+lastIndex+")")[0].outerHTML)
        .insertAfter($(".inputautofill:eq("+lastIndex+")"));
/*
        .autocomplete({ // ใช้งาน autocomplete กับ input text id=tags
            minLength: 0, // กำหนดค่าสำหรับค้นหาอย่างน้อยเป็น 0 สำหรับใช้กับปุ่ใแสดงทั้งหมด
            source: "get_suggest.php", // กำหนดให้ใช้ค่าจากการค้นหาในฐานข้อมูล
        });
*/
        $(".inputautofill:eq("+lastIndex+")").remove(); // ลบตัวเดิมออก หลังจากแทนที่ตัวใหม่แล้ว
    });
    $("#removeRow").click(function(){
        // // ส่วนสำหรับการลบ
//         console.log($(this).parent());
        if($("#myTbl tr").size()>2){ // จะลบรายการได้ อย่างน้อย ต้องมี 1 รายการ
            $(this).parent().parent().remove(); // ลบรายการสุดท้าย
        }else{
            // เหลือ 1 รายการลบไม่ได้
            alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");
        }
    });

     $( "#mdeqcode" ).autocomplete({ // ใช้งาน autocomplete กับ input text id=tags
        minLength: 0, // กำหนดค่าสำหรับค้นหาอย่างน้อยเป็น 0 สำหรับใช้กับปุ่ใแสดงทั้งหมด
        source: "get_mdeqfororderlist.php", // กำหนดให้ใช้ค่าจากการค้นหาในฐานข้อมูล
         select: function( event, ui ) {
                // สำหรับทดสอบแสดงค่า เมื่อเลือกรายการ
              console.log( ui.item );
               //   "Selected: " + ui.item.label :
                //  "Nothing selected, input was " + this.value);
                $("#name").val(ui.item.name);
//                  $("#num").val(ui.item.unit);
                  $("#price").val(ui.item.price);
                  $("#mdeqid").val(ui.item.id);
                 $("#mdeqcode").val(ui.item.code); // เก็บ id ไว้ใน hiden element ไว้นำค่าไปใช้งาน
                //setTimeout(function(){
                 // $("#h_input_q").parents("form").submit(); // เมื่อเลือกรายการแล้วให้ส่งค่าฟอร์ม ทันที
           //},500);
            }
        });


});
</script>

<?php
if($_POST){
	print_r($_POST);
 	$rs = $db->insert('orderlist',array(
                'orderlist_amourt' => $_POST['num'],
                'orderlist_cost' => $_POST['price'],
                'orderlist_costfake' => $_POST['fakeprice'],
                'mdeq_mdeq_id' => $_POST['mdeqid'],
    ) );
}
?>
