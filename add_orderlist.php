<div class="card">
        <div class="card-body">
                <div class="table-responsive">
                        <div id="table_wraper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="myTbl" class="table table-hover table-striped table-bordered dataTable" border="1" cellspacing="2" cellpadding="0">
                                        <thead>
                                                <tr>
                                                        <td>เพิ่ม</td>
                                                        <td>ชื่ออุปกรณ์การแพทย์</td>
                                                        <td>จำนวน</td>
                                                        <td>ราคา</td>
                                                        <td>ราคาปลอม</td>
                                                        <td>ลบ</td>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <tr class="firstTr">
                                                        <td><button id="addRow" type="button"><i class="fas fa-plus"></i></button></td>
                                                        <td><input type="text" class="text_data inputautofill w-100" name="field[0][name]" id="name" /></td>
                                                        <td><input type="text" class="text_data inputautofill w-100" name="field[0][price]" id="num" /></td>
                                                        <td><input type="text" class="text_data inputautofill w-100" name="field[0][price]" id="price" /></td>
                                                        <td><input type="text" class="text_data inputautofill w-100" name="field[0][fakeprice]" id="fakeprice" />
                                                        <input type="hidden" class="text_data inputautofill w-100" name="field[0][mdeqid]" id="mdeqid" /></td>
                                                        <td><button id="removeRow" type="button"><i class="fas fa-minus"></i></button></td>
                                                </tr>
                                        </tbody>
                                </table>
                        </div>
                </div>
        </div>
</div>
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
                i++;
        $(".firstTr:eq(" + i + ")").children().children().eq(1).attr("name","field[" + i + "][code]");
        $(".firstTr:eq(" + i + ")").children().children().eq(2).attr("name","field[" + i + "][name]");
        $(".firstTr:eq(" + i + ")").children().children().eq(3).attr("name","field[" + i + "][num]");
        $(".firstTr:eq(" + i + ")").children().children().eq(4).attr("name","field[" + i + "][price]");
        $(".firstTr:eq(" + i + ")").children().children().eq(5).attr("name","field[" + i + "][fakeprice]");
        $(".firstTr:eq(" + i + ")").children().children().eq(6).attr("name","field[" + i + "][mdeqid]");
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
        if($("#myTbl tr").length>2){ // จะลบรายการได้ อย่างน้อย ต้องมี 1 รายการ
            $(this).parent().parent().remove(); // ลบรายการสุดท้าย
        }else{
            // เหลือ 1 รายการลบไม่ได้
            alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");
        }
    });

     $( "#name" ).autocomplete({ // ใช้งาน autocomplete กับ input text id=tags
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
                'mdeq_mdeq_id' => $_POST['mdeqid'],
    ) );
}
?>
