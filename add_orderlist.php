<div class="card w-100">
        <div class="card-body">
                <div class="table-responsive">
                        <div id="table_wraper" class="dataTables_wrapper dt-bootstrap4">
                                <table id="myTbl" class="table table-hover table-striped table-bordered dataTable" border="1" cellspacing="2" cellpadding="0">
                                        <thead>
                                                <tr>
	                                                	<td>รหัสสินค้า</td>
                                                        <td>ชื่ออุปกรณ์การแพทย์</td>
                                                        <td>จำนวน</td>
                                                        <td>ราคา</td>
                                                        <td>ราคาปลอม</td>
                                                        <td>ลบ</td>
                                                </tr>
                                        </thead>
                                        <tbody>
                                                <tr class="firstTr">
	                                                	<td>
		                                                	<input type="text" class="text_data inputautofill w-100 mdeqcode" name="field[0][mdeqcode]" id="mdeqcode_0" />
		                                                </td>
                                                        <td>
	                                                        <input type="text" class="text_data inputautofill w-100 name" name="field[0][name]" id="name_0" /></td>
                                                        <td>
															<input type="text" class="text_data inputautofill w-100 num" name="field[0][num]" id="num_0" />
														</td>
                                                        <td>
	                                                        <input type="text" class="text_data inputautofill w-100 price" name="field[0][price]" id="price_0" />
	                                                        </td>
                                                        <td>
	                                                        <input type="text" class="text_data inputautofill w-100 fakepice" name="field[0][fakeprice]" id="fakeprice_0" />
															<input type="hidden" class="text_data inputautofill w-100 mdeqid" name="field[0][mdeqid]" id="mdeqid_0" />
															<input type="hidden" class="text_data inputautofill w-100 amount" name="field[0][amount]" id="amount_0" />
                                                        </td>
                                                        <td>
                                                            <button id="removeRow0" type="button" class="circle-plus minus"><i class="fas fa-minus"></i></button>
	                                                    </td>
                                                </tr>
                                        </tbody>
                                </table>
                                <button id="addRow" type="button" class="circle-plus"><i class="fas fa-plus"></i></button>
                        </div>
                </div>
        </div>
</div>
<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">คุณกรอกจำนวนสินค้ามากกว่ายอดคงเหลือในคลังสินค้า</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<p id="numstock"></p>
        <p>หากท่านต้องการเพิ่มจำนวนสินค้าในคลังสินค้า </p>
        <p>>>>>>><a href="http://localhost/fdp/main.php?url=add_stock.php">คลิกที่นี้</a>&#60;&#60;&#60;&#60;&#60;&#60;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
	var i = 0;

   function autocomplete($els) {
        $els.autocomplete({ // ใช้งาน autocomplete กับ input text id=tags
			        minLength: 0, // กำหนดค่าสำหรับค้นหาอย่างน้อยเป็น 0 สำหรับใช้กับปุ่ใแสดงทั้งหมด
			        source: "get_mdeqfororderlist.php", // กำหนดให้ใช้ค่าจากการค้นหาในฐานข้อมูล
					matchContains: true,
					selectFirst: false,
			         select: function( event, ui ) {
			                // สำหรับทดสอบแสดงค่า เมื่อเลือกรายการ
			                //   "Selected: " + ui.item.label :
			                //  "Nothing selected, input was " + this.value);
							var table = $(this).parent().parent()

			                table.find(".mdeqcode").val(ui.item.name);
			                table.find(".name").val(ui.item.name);
// 			                table.find(".num").val(ui.item.unit);
			                table.find(".price").val(ui.item.price);
			                table.find(".mdeqid").val(ui.item.id);
			                table.find(".mdeqcode").val(ui.item.code); // เก็บ id ไว้ใน hiden element ไว้นำค่าไปใช้งาน
							table.find(".num").change(function(){
							     if(parseInt(this.value) > ui.item.unit){
							        $("#numstock").text("ในคลังสินค้ามีจำนวนคงเหลือ"+ui.item.unit);
							        $(".modal").modal()
							     }
							})

							return false;
			            }
			     });

	}

function getTotal(){
    var total = 0.0;
    $('.amount').each(function(){
        total += parseFloat(this.value)
    });
    $('#sumprice').val(total);
}
function getamount(idinput){
	$(idinput).on("change",function(){
	    var parent = $(this).parents('tr');
	    var price = $('.price', parent);
	    var sum = $('.amount', parent);
	    console.log(price.get(0).value);
	    var value = parseInt(this.value) * parseFloat(price.get(0).value);
	    sum.val(value);
	    console.log(value);
	    getTotal();
	});
}

	autocomplete($("#mdeqcode_0"));
    deleterows("#removeRow0");
    getamount("#num_0");
    $("#addRow").click(function(){
        // ส่วนของการ clone ข้อมูลด้วย jquery clone() ค่า true คือ
        // การกำหนดให้ ไม่ต้องมีการ ดึงข้อมูลจากค่าเดิมมาใช้งาน
        // รีเซ้ตเป็นค่าว่าง ถ้ามีข้อมูลอยู่แล้ว ทั้ง select หรือ input
        $(".firstTr:eq(0)").clone()
        .find("input").attr("value","").end()
        .appendTo($("#myTbl"));
               i++;
        $(".firstTr:eq(" + i + ")").children().children().eq(0).attr("name","field[" + i + "][mdeqcode]").attr("id","mdeqcode_"+i);
        $(".firstTr:eq(" + i + ")").children().children().eq(1).attr("name","field[" + i + "][name]").attr("id","name_"+i);
        $(".firstTr:eq(" + i + ")").children().children().eq(2).attr("name","field[" + i + "][num]").attr("id","num_"+i);
        $(".firstTr:eq(" + i + ")").children().children().eq(3).attr("name","field[" + i + "][price]").attr("id","price_"+i);
        $(".firstTr:eq(" + i + ")").children().children().eq(4).attr("name","field[" + i + "][fakeprice]").attr("id","fakeprice_"+i);
        $(".firstTr:eq(" + i + ")").children().children().eq(5).attr("name","field[" + i + "][mdeqid]").attr("id","mdeqid_"+i);
        $(".firstTr:eq(" + i + ")").children().children().eq(6).attr("name","field[" + i + "][amount]").attr("id","amount_"+i);
		$(".firstTr:eq(" + i + ")").children().children().eq(7).attr("id","removeRow"+i);
        autocomplete($("#mdeqcode_" + i));
        deleterows("#removeRow" + i);
        getamount("#num_" + i);
/*
        var lastIndex=$(".inputautofill").length-1; // หา index ของตัว input ล่าสุด
        // สร้าง input element เพื่อที่จะไปแทนที่ตัวเก่า
        $($(".inputautofill:eq("+lastIndex+")")[0].outerHTML)
        .insertAfter($(".inputautofill:eq("+lastIndex+")"));
/*
        .autocomplete({ // ใช้งาน autocomplete กับ input text id=tags
            minLength: 0, // กำหนดค่าสำหรับค้นหาอย่างน้อยเป็น 0 สำหรับใช้กับปุ่ใแสดงทั้งหมด
            source: "get_suggest.php", // กำหนดให้ใช้ค่าจากการค้นหาในฐานข้อมูล
        });
        $(".inputautofill:eq("+lastIndex+")").remove(); // ลบตัวเดิมออก หลังจากแทนที่ตัวใหม่แล้ว
*/

    });
    function deleterows(e){
    $(e).click(function(){
        // // ส่วนสำหรับการลบ
//         console.log($(this).parent());
        if($("#myTbl tr").length>2){ // จะลบรายการได้ อย่างน้อย ต้องมี 1 รายการ
            $(this).parent().parent().remove(); // ลบรายการสุดท้าย
        }else{
            // เหลือ 1 รายการลบไม่ได้
            alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");
        }
    });
	}
</script>
