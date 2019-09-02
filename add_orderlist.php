<?php
/// ส่วนของการเพิ่ม ลบ แก้ไข ข้อมูล
/*
if(isset($_POST['Submit'])){

    // ตรวจสอบค่า id หลักของข้อมูล ว่ามีข้อมูลหรือไม่
    if(isset($_POST['h_item_id']) && count($_POST['h_item_id'])>0){
        // แยกค่า id หลักของข้อมูลเดิม ถ้ามี เก็บเป็นตัวแปร array
        $h_data_id_arr=explode(",",$_POST['h_all_id_data']);
        foreach($_POST['h_item_id'] as $key_data=>$value_data){// วนลูป จัดการกับค่า id หลัก
            if($value_data==""){ // ถ้าไม่มีค่า แสดงว่า จะเป็นการเพิ่มข้อมูลใหม่
                $rs = $db->insert('orderlist',array(
                'orderlist_mdeqcode' => $_POST['orderlist_mdeqcode'],
                'emp_email' => $_POST['emp_email'],
                'emp_password' => $_POST['emp_password'],
                'emp_idcard' => $_POST['emp_idcard'],
            ) );
                $sql = "
                    INSERT INTO tbl_data (
                        data_id,
                        data_text,
                        data_select
                    )
                    VALUES (
                        NULL ,
                          '".$_POST['orderlist_mdeqcode'][$key_data]."',
                            '".$_POST['data1'][$key_data]."'
                    );
                ";
                $mysqli->query($sql);
            }else{ // ถ้ามีค่าอยู่แล้ว ให้อัพเดท รายการข้อมูลเดิม โดยใช้ ค่า id หลัก
                $sql = "
                    UPDATE  tbl_data SET
                    data_text =  '".$_POST['data2'][$key_data]."',
                    data_select =  '".$_POST['data1'][$key_data]."'
                    WHERE data_id='".$value_data."' ;
                ";
                $mysqli->query($sql);
            }
        }

        // ตรวจสอบ id หลัก ค่าเดิม และค่าใหม่ เพื่อหาค่าที่ถูกลบออกไป
        $h_data_id_arr_del = array_diff($h_data_id_arr, $_POST['h_item_id']);
        if(count($h_data_id_arr_del)>0){ // ถ้ามี array ค่า id หลัก ที่จะถูกลบ
            foreach($h_data_id_arr_del as $key_data=>$value_data){// วนลูป ลบรายการที่ไม่ต้องการ
                $sql = "
                    DELETE FROM tbl_data WHERE data_id='".$value_data."' ;
                ";
                $mysqli->query($sql);
            }
        }


    }
}
*/
	include_once('tools/db_tools.php');
    $form = new form();
    $token = new tokens();
    $tk = $token->openToken();
?>
<div style="margin:auto;">
    <?php
    echo $form->open("form_reg","","col-12 tx1","#","");
    ?>
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
<?php
$all_id_data = array();

if(isset($result) && $result->num_rows>0){
?>
<?php
    while($row = $result->fetch_assoc()){
        $all_id_data[].=$row['data_id'];
?>
  <tr class="firstTr">
    <td>
        <input type="text" class="text_data inputautofill" name="data2[]" id="data2[]" value="<?=$row['data_text']?>" />
    </td>
    <td>
        <input type="text" class="text_data inputautofill" name="data2[]" id="data2[]" value="<?=$row['data_text']?>" />
    </td>
    <td>
        <input type="text" class="text_data inputautofill" name="data2[]" id="data2[]" value="<?=$row['data_text']?>" />
    </td>
    <td>
        <input type="text" class="text_data inputautofill" name="data2[]" id="data2[]" value="<?=$row['data_text']?>" />
    </td>
    <td>
    <input name="h_item_id[]" type="hidden" id="h_item_id[]" value="<?=$row['data_id']?>" />
    <input type="text" class="text_data inputautofill" name="data2[]" id="data2[]" value="<?=$row['data_text']?>" />
    </td>
    </tr>
<?php } ?>
<?php }else{ ?>
  <tr class="firstTr">
    <td>
    <button id="addRow" type="button"><i class="fas fa-plus"></i></button>
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="code" id="mdeqcode" />
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="name" id="name" />
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="num" id="num" />
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="price" id="price" />
    </td>
    <td>
    <input type="text" class="text_data inputautofill" name="fakeprice" id="fakeprice" />
    <input type="hidden" class="text_data inputautofill" name="mdeqid" id="mdeqid" />
    </td>
       <td>
            <button id="removeRow" type="button"><i class="fas fa-minus"></i></button>
    </td>
    </tr>
 <?php } ?>
</table>
<br />
<table width="" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    <input type="submit" name="Submit" id="Submit" value="Submit" /></td>
  </tr>
</table>
</form>



<br />
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
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
