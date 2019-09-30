<?php
include_once 'change2thaidate.php';
//include_once 'tools/db_tools.php';
//include_once 'connect.php';
class gridView{
	public $name,$data,$delete,$edit,$img,$imgpath,$view,$deletetxt,$edittxt,$imgname,$printtxt,$viewtxt,$header,$width,$pr,$change,$changestatus,$sts,$span,$link,$special,$system,$showimg;


	function __construct(){
		$this->deletetxt = 'ลบ';
		//$this->edittxt = 'อนุมัติ';
		$this->printtxt = '';
		$this->viewtxt = 'รายละเอียด';
		$this->header = array();
		$this->footer = array();
		$this->width = array();
	}


	function __toString(){
		$html = "";
		$header = "";
		$footer = "";
		$body = "";

/* ส่วนหัวข้อ */
		$size = count($this->header);
		for($i = 0; $i<$size; $i++){
			$headertxt = $this->header[$i];
			$headerwidth = $this->width[$i];

			$header.= "<td width='{$headerwidth}'>{$headertxt}</td>";
		}
/* ส่วนสรุป */
		$size = count($this->footer);
		for($i = 0; $i<$size; $i++){
			$footertxt = $this->footer[$i];
			$footerwidth = $this->footer[$i];

			$footer.= "<td width='{$footerwidth}'>{$footertxt}</td>";
		}
/* ส่วนของข้อมูล */
		$size = count($this->data);
		for($i=0; $i<$size; $i++){
			$row = $this->data[$i];
			$columncount = count($row);

			$body.="<tr>";
			for($j=0; $j<$columncount;$j++){
				$columntxt = $row[$j];
				$body.="<td>{$columntxt}</td>";
			}
			$body.="</tr>";
		}

/* รูปแบบ */
		$html = "
		<table id='{$this->name}' border='0' style='border=collapse: collapse;'>
			<thead class='headrow'>
				<tr>
					{$header}
				</tr>
			</thead>
			<tbody class='sizerow'>
				{$body}
			</tbody>
		</table>";
		return $html;
	}

	function renderFromDB($fields, $result){
		$html ="";
		$header ="";
		$footer ="";
		$body ="";

/* ส่วนหัว */
		$size = count($this->header);
		for($i=0; $i<$size;$i++){
			$headertxt = $this->header[$i];
			$headerwidth = $this->width[$i];

			$header.="<td width='{$headerwidth}'>{$headertxt}</td>";
		}
/* ส่วนสรุป */
		$size = count($this->footer);
		for($i = 0; $i<$size; $i++){
			$footertxt = $this->footer[$i];
			$footerwidth = $this->footer[$i];

			$footer.= "<td width='{$footerwidth}'>{$footertxt}</td>";
		}

		$columncount = count($fields);
			while( $r = $result->moveNext_getRow('assoc')){

    			@$id = $r[$this->pr];

				$body.="<tr data-href=".$this->link."&id=".$id.">";

				for($i =0; $i<$columncount; $i++){
    				//ส่วนนี้อาจกระทบทั้งระบบ
    				$body.="<td><center>";

    				    $fieldIndex = $fields[$i];
                        $columntxt = $r[$fieldIndex];
                        $body.= $columntxt;

				if(!empty(@$r)){
				if(@$r['order_status'] == 'W'){
					 @$r['order_status'] = "รออนุมัติ";
				}
				if(@$r['order_status'] == 'N'){
					 @$r['order_status'] = "ไม่อนุมัติ";
				}
				if(@$r['order_status'] == 'Y'){
					 @$r['order_status'] = "อนุมัติแล้ว";
				}

			}
				 $body.="</center></td>";
				}
                @$id = $r[$this->pr];
                @$status = $r[$this->sts];
    			@$showimg = $r[$this->imgname];
			/* ส่วนตรวจสอบค่า */
            @$con = mysqli_connect("localhost","root","","hajer");
			@$sql = "SELECT * FROM problem WHERE problem_id = $id"; //ไว้แก้ เปลี่ยนสเตตัส
			@$sqlplan = "SELECT * FROM plan WHERE plan_id = $id"; //ไว้แก้ เปลี่ยนสเตตัส
			@$query= mysqli_query($con,$sql);
			@$queryplan= mysqli_query($con,$sqlplan);
			if(!empty($query)){
			@$rs_c = mysqli_fetch_array($query,MYSQLI_ASSOC);
			}
			if(!empty($queryplan)){
			@$rs_plan = mysqli_fetch_array($queryplan,MYSQLI_ASSOC);
			}
			 if(@$rs_c["problem_status"]=='Y')
			{
				$this->changestatus ='btn btn-success editok';
				$this->span ='glyphicon glyphicon-ok-sign';
				$this->changetxt = '&nbsp;ดำเนินการแก้ไขแล้ว';
			}
			else if(@$rs_c["problem_status"]=='N')
			{
				$this->changestatus ='btn btn-primary editwait';
				$this->span ='glyphicon glyphicon-info-sign';
				$this->changetxt = '&nbsp;รอการดำเนินการ';
			}
			else if(@$rs_c["problem_status"]=='S')
			{
				$this->changestatus ='btn btn-warning editok';
				$this->span ='glyphicon glyphicon-question-sign';
				$this->changetxt = '&nbsp;กำลังดำเนินการแก้ไข';
			}
			if($this->imgpath !=""){

				$body .="
				<td>
					<a  href={$this->img} data-toggle='modal' data-target='#Modal' data-whatever='{$id}'>
						<img id ='image' src = '{$this->imgpath}{$showimg}.jpg' width='150' height='150'>
					</a>
				</td>";
			}
			if($this->view !=""){
				$body .="
				<td>
                     <button type='button' class='btn btn-info w-100' data-toggle='modal' data-target='#Modal' data-whatever='{$id}'>{$this->viewtxt}</button>"
                                . "</td>";
			}
/* 				add delete */
			if($this->delete !=""){
				$body.="
					<td>
                         <a href='{$this->delete}?id={$id}' class='btn btn-danger deletebox' OnClick='return chkdel();' >{$this->deletetxt}</a>
					</td>";
			}
/* 				add edit */
			if($this->edit !=""){

				$body .="
				<td>
					<a href='{$this->edit}&id={$id}'class='btn btn-warning w-100'>{$this->edittxt}</a>
				</td>";
			}
			if($this->change !=""){

				$body .="
				<td>
					<a href='{$this->change}?id={$id}&&status={$status}'class='{$this->changestatus}'><span class='{$this->span}'></span>{$this->changetxt}</a>
				</td>";
			}


				$body.="</td>";
			}
			$html = "
				<table id='{$this->name}' class='table table-hover table-striped table-bordered edittable tablefp' border='0' border=collapse: collapse;' style='width:100%'>
					<thead class='headrow'>";
// 					ตัวแก้ไข
						$html .="<tr>
							{$header}
						</tr>
					</thead>
					<tbody class='sizerow'>
						{$body}
					</tbody>
                    <tfoot class='footerrow'>
                        <tr>
                        {$footer}
                        </tr>
                    </tfoot>
				</table>";
				echo $html;
	}
}
?>
