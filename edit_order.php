<?php
    $form = new form();
    $lbnamecustomer = new label('ลูกค้า');
    $lbnamessale = new label('ผู้ออก');
    $lbdate = new label('วันที่สั่ง');
    $lbaddress = new label('ที่อยู่');
    $lbtel = new label('เบอร์โทรศัพท์');
    $lbdateexp = new label('วันที่หมดอายุ');
    $lbocode = new label('เลขที่ใบเสนอราคา');
    $lbcomment = new label('หมายเหตุ');
    $txtnamecustomer = new textfield('','customer_name','form-control','','');
    $txtaddress = new textfieldreadonly('', 'customer_address', '');
    $txttel = new textfieldreadonly('', 'customer_tel', '');
    $txtdate = new textfield('order_date','','form-control','','');
    $txtdateexp = new textfield('order_dateexp','','form-control','','');
    $txtocode = new textfield('order_code','','form-control','','');
    $txtcomment = new textArea('order_comment', 'form-control col-12', '', '', 3, 2,' ');
    $txtdatestart = new datetimepicker('order_date','datetimepicker1','','form-control datetimepicker-input','date-form dayinbox form-horizontal control-group controls input-group','input-group date','datetimepicker1','#datetimepicker1','','');
    $txtdateend = new datetimepicker('order_dateexp','datetimepicker2','','form-control datetimepicker-input','date-form dayinbox form-horizontal control-group controls input-group','input-group date','datetimepicker2','#datetimepicker2','','');
    $txtpricesum = new textfield('sumprice','','form-control','','');
    $submit = new buttonok('บันทึก','btnSubmit','btn btn-success col-12','');
    $token = new tokens();
    $tk = $token->openToken();
       if(!empty($_GET['id'])){
	    $id = $_GET['id'];
		$r = $db->findByPK(array(
							'`order`','customer'
						  ),array(
							'customer_customer_id' => 'customer_id',
							'order_id'=>$id,
						  ));
			while($cols = $r->moveNext_getRow('assoc')){
							$txtocode =  $cols['order_code'];
							$txtnamecustomer= $cols['customer_name'];
							$txtdate= $cols['order_date'];
							$txtdateexp= $cols['order_dateexp'];
							$txtaddress= $cols['customer_address'];
							$txttel= $cols['customer_tel'];
							$txtcomment= $cols['order_comment'];
							$txtpricesum= $cols['order_sumshow'];
			}
	}
?>
<div class="col-12 card bdadd">
        <div class="row">
                <div class="col-12 pt-3 tx3 card-header">
                        <div class="row">
                                <span class="pl-2 achf">สร้างใบเสนอราคา</span>
                        </div>
                </div>
<?php echo $form->open("form_reg","","typetoolbox col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3","insert_editorder.php",""); ?>
                <div class="col-12">
                        <div class="row">
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 ml-auto pt-1 tx2 aodtext1">
                                                        <?php echo $lbocode; ?>
                                                </div>
                                                <div class="w-100 pt-1 tx2 aodinp1">
                                                        <?php echo $txtocode; ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="row">
                                                                <div class="w-100 tx2 pt-1 aodtext">
                                                                        <?php echo $lbnamecustomer; ?>
                                                                </div>
                                                                <div class="w-100 pt-1 tx2 aodinp2">
                                                                        <?php echo $txtnamecustomer; ?>
                                                                </div>

                                                        </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                                        <div class="row">
                                                                <div class="w-100 tx2 pt-1 aodtext2 mgt">
                                                                        <?php echo $lbdate; ?>
                                                                </div>
                                                                <div class="w-100 pt-1 tx2 aoddate mgt">
                                                                       <?php echo $txtdate; ?>
                                                                </div>
                                                                <div class="w-100 tx2 pt-1 aodtext3 mgt">
                                                                        <?php echo $lbdateexp; ?>
                                                                </div>
                                                                <div class="w-100 pt-1 tx2 aoddate mgt">
                                                                        <?php echo $txtdateexp;?>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 tx2 pt-1 aodtext">
                                                        <?php echo $lbaddress; ?>
                                                </div>
                                                <div class="w-100 pt-1 tx2 aodinp3">
                                                        <?php echo $txtaddress ; ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <div class="w-100 tx2 pt-1 aodtext">
                                                        <?php echo $lbtel; ?>
                                                </div>
                                                <div class="w-100 pt-1 tx2 aodinp4">
                                                        <?php echo $txttel; ?>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 tx2">
                                        <div class="row">
                                                <?php include 'edit_orderlist.php'; ?>
                                        </div>
                                </div>
                                <div class="col-12 mt-2 ">
                                        <div class="row">
                                                <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                                                        <div class="row">
                                                                <div class="col-12 mt-2 pl-0 pr-0 tx2"><?php echo $lbcomment; ?></div>
                                                                <div class="col-12 pl-0 pr-0"><?php echo $txtcomment; ?></div>
                                                        </div>
                                                </div>
                                                <div class="col-xl-2 col-lg-1 col-md-12 col-12"></div>
                                                <div class="col-xl-4 col-lg-5 col-md-12 col-12">
                                                        <div class="row">
                                                                <div class="col-12" style="margin-top: 38px;border-top: solid 1px #8e8e8e;border-bottom: double 5px #8e8e8e;">
                                                                        <div class="row">
                                                                                <div class="col-6 tx2 mt-3"><p style="text-align: right;"><b>ยอดรวมสุทธิ</b></p></div>
                                                                                <div class="col-6 mt-3"><p style="text-align: center;"><?php echo $txtpricesum; ?></p></div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="col-12 mt-3 mb-3">
                                        <div class="row">
                                                <div class="col-xl-11 col-lg-10 col-md-10 col-9">
			<input type="hidden" id ="customer_id" name="customer_id" value=""/>
                                                <input type="hidden" id ="customer_id" name="order_status" value="w"/>
			<input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>"/>
                    		</div>
                                                <div class="col-xl-6 col-lg-8 col-md-12 col-12">
                                                        <div class="row">
                                                                <div class="btn-group btn-group-toggle col-12" data-toggle="buttons">
                                                                        <label class="btn btn-success active col-6">
                                                                                <input type="radio" name="order_status" value="Y" onchange="swapConfig(this)" id="complete" autocomplete="off" checked> 
                                                                                อนุมัติใบเสนอราคา
                                                                        </label>
                                                                        <label class="btn btn-warning col-6">
                                                                                <input type="radio" name="order_status" value="N" onchange="swapConfig(this)" id="nocomplete" autocomplete="off">
                                                                                ไม่อนุมัติใบเสนอราคา
                                                                        </label>
                                                                </div>
                                                        </div>
                                                </div>
			<div class="col-xl-2 col-lg-2 col-md-3 col-4 ml-auto allmt">
			<input type="hidden" name="order_id" value="<?php echo $_GET['id']; ?>">
                                                        <?php echo $submit; ?>
			</div>
                                        </div>
                                </div>
    <?php echo $form->close();?>
                        </div>
                </div>
                <div class="col-xl-1 col-lg-2 col-md-2 col-xs-1"></div>
        </div>
</div>


<script>
function swapConfig(x) {
    var radioName = document.getElementsByName(x.name);
    for(i = 0 ; i < radioName.length; i++){
      document.getElementById(radioName[i].id.concat("Settings")).style.display="none";
    }
    document.getElementById(x.id.concat("Settings")).style.display="initial";

  }
 $(function() {
        $('#datetimepicker1').datetimepicker({
	        format:'YYYY-MM-DD',
	        useCurrent: false,
	        ignoreReadonly: true,
            sideBySide: true,
            allowInputToggle: true,
	        locale:moment.locale('th'),
	        stepping: 30
        });
        $('#datetimepicker2').datetimepicker({
	        format:'YYYY-MM-DD',
            useCurrent: false,
            ignoreReadonly: true,
            sideBySide: true,
            allowInputToggle: true,
            locale:moment.locale('th'),
            stepping: 30
        });
         $("#datetimepicker1").on("change.datetimepicker", function (e) {
            $('#datetimepicker2').datetimepicker('minDate', e.date);
             var widget = $(this).find(".bootstrap-datetimepicker-widget");
        });
        $("#datetimepicker2").on("change.datetimepicker", function (e) {
            $('#datetimepicker1').datetimepicker('maxDate', e.date);
            var widget = $(this).find(".bootstrap-datetimepicker-widget");
        });
		$("#content-wrapper").on("click", function (e) {
		 		var widget = $(this).find(".bootstrap-datetimepicker-widget");
                    widget.hide();
		});

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
                $("#customer_address").val(ui.item.add); // เก็บ id ไว้ใน hiden element ไว้นำค่าไปใช้งาน
                $("#customer_tel").val(ui.item.tel);
                $("#customer_id").val(ui.item.id);
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
	$( "#form_reg" ).validate({
		rules: {
		    customer_name: "required",
		    customer_address: "required",
		    customer_tel: "required",
		    order_date: "required",
		    order_dateexp: "required",
		    order_code: "required",
		    name: "required",
		    num: "required",
		    price: "required",
		    fakeprice: "required",
  		}
	});
        </script>

