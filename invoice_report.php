<?php
	ob_start();
	require_once 'vendor/autoload.php';
	error_reporting(0);
    ?>

<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        </head>
        <body style="margin:0; margin-top:-20px;">
                <!--บรรทัดที่ 1-->
                <table style="">
                        <tr>
                                <td style="font-size:18px;">ใบแจ้งหนี้</td>
		<td><img height="20px" src="images/fdp.png" style="padding-left:520px;" /></td>
                        </tr>
	</table>
                <!--บรรทัดที่ 2-->
                <table style="">
                        <tr>
                                <td style="font-size:18px;">INVOICE</td>
		<td>(ต้นฉบับ/original)</td>
                        </tr>
	</table>
                <!--บรรทัดที่ 3-->
                <table style="font-size:14px;margin-top:32px;">
                        <tr>
                                <td style="width:110px;">ลูกค้า/Customer</td>
		<td style="width:410px;"><!--ใส่ชื่อสถานประกอบการ--></td>
                                <td style="width:90px;">เลขที่/No.</td>
		<td><!--ใส่เลข ORDER--></td>
                        </tr>
	</table>
                <!--บรรทัดที่ 4-->
                <table style="font-size:14px;">
                        <tr>
                                <td style="width:110px;">ที่อยู่/Address</td>
		<td style="width:410px;"><!--ใส่ที่อยู่ลูกค้า--></td>
                                <td style="width:90px;">วันที่/Issue</td>
		<td><!--ใส่วันที่--></td>
                        </tr>
	</table>
                <!--บรรทัดที่ 5-->
                <table style="font-size:14px;">
                        <tr>
                                <td style="width:110px;">ผู้ติดต่อ/Contact</td>
		<td style="width:410px;"><!--ใส่ชื่อผู้ติดต่อ--></td>
                                <td style="width:90px;">ยอมรับ/Valid</td>
		<td><!--ใส่วันที่ confirm--></td>
                        </tr>
	</table>
                <!--บรรทัดที่ 6-->
                <table style="font-size:14px;border-bottom: 1px;border-bottom-style: dotted;border-bottom-color: #000000;border-spacing: 0;">
                        <tr>
                                <td style="width:110px;"></td>
                                <td style="width:40px;">Tel :</td>
		<td style="width:110px;"><!--ใส่ เบอร์ติดต่อ--></td>
                                <td style="width:60px;">E-mail :</td>410
		<td style="width:200px;"><!--ใส่ E-mail--></td>
                                <td style="width:90px;">อ้างอิง/Ref.</td>
		<td style="width:60px;"><!--ใส่เลขที่อ้างอิง--></td>
                        </tr>
	</table>
                <!--บรรทัดที่ 7-->
                <table style="font-size:14px;">
                        <tr>
                                <td style="width:110px;">ผู้ออก/Issuer</td>
                                <td style="">FdP</td>
                        </tr>
                </table>
                <!--บรรทัดที่ 8-->
                <table style="font-size:14px;">
                        <tr>
                                <td style="width:110px;">จัดเตรียมโดย</td>
                                <td style=""><!--ใส่ชื่อ เซล์ล--></td>
                        </tr>
	</table>
                <!--บรรทัดที่ 9-->
                <table style="font-size:14px;">
                        <tr>
                                <td style="width:110px;"></td>
                                <td style="width:40px;">Tel :</td>
		<td style="width:110px;"><!--ใส่ เบอร์ติดต่อ--></td>
                                <td style="width:60px;">E-mail :</td>410
		<td style=""><!--ใส่ E-mail--></td>
                        </tr>
	</table>
                <!--ส่วนของตาราง-->
                <!--หัวตาราง-->
                <table style="font-size:12px;border-top: solid 1px #000;margin-top:16px;text-align: center;border-spacing: 0;">
                        <tr>
                                <td style="width:50px;height:50px;border-right: solid 1px #000;">รหัส</td>
                                <td style="width:370px;border-right: solid 1px #000;">รายการ</td>
                                <td style="width:50px;border-right: solid 1px #000;">จำนวน</td>
                                <td style="width:100px;border-right: solid 1px #000;">ราคา/หน่วย</td>
                                <td style="width:100px;">มูลค่ารวม</td>
                        </tr>
                </table>
                <table style="font-size:12px;border-top: solid 1px #000;border-bottom: solid 1px #000;text-align: center;border-spacing: 0;">       
                        <tr style="magin-top:px;">
                                <td style="width:50px;height:400px;border-right: solid 1px #000;text-align: center;"><!--ใส่รหัสสินค้า--></td>
                                <td style="width:370px;border-right: solid 1px #000;"><!--ใส่ชื่อสินค้า--></td>
                                <td style="width:50px;border-right: solid 1px #000;text-align: center;"><!--ใส่ชื่อสินค้า--></td>
                                <td style="width:100px;border-right: solid 1px #000;text-align: right;"></td>
                                <td style="width:100px;text-align: right;"></td>
                        </tr>
	</table>
                <!--รายละเอียดจำนวนเงินทั้งสิ้นตาราง-->
                <table style="font-size:14px;border-spacing: 0;">
                        <tr>
                                <td style="width:70px;padding-top:10px;">หมายเหตุ</td>
                                <td style="width:500px;border-right: solid 1px #000;text-align: right;padding-top:10px;">จำนวนเงินรวม</td>
                                <td style="width:100px;text-align: right;border-bottom: solid 1px #000;"></td>
                        </tr>
                </table>
                <table>
                        <tr>
                                <td style="width:570px;"></td>
                                <td style="width:100px;border-bottom: solid 3px #000;"></td>
                        </tr>
	</table>
                <table style="font-size:14px;">
                        <tr>
                                <td style="width:270px;padding-top:5px;"></td>
                                <td style="width:150px;text-align: right;padding-top:5px;">จำนวนเงินรวมทั้งสิ้น</td>
                                <td style="width:250px;">(หนึ่งพันบาทถ้วน)</td>
                        </tr>
	</table>
                <table style="font-size:14px;border-bottom: solid 1px #000;">
                        <tr>
                                <td style="height:50px; width:670px;"></td>
                        </tr>
	</table>
                <!--ส่วนของผู้ลงนาม-->
                <table style="font-size:12px;margin-top: 8px;">
                        <tr>
                                <td style="width:360px;"></td>
                                <td style="width:150px;">ผู้ส่ง</td>
                                <td style="width:10px;"></td>
                                <td style="width:150px;">ผู้รับ</td>
                        </tr>
                </table>
                <table style="font-size:12px;margin-top:60px;">
                        <tr>
                                <td style="width:360px;"></td>
                                <td style="width:150px;border-bottom: dotted 1px #000;"></td>
                                <td style="width:10px;"></td>
                                <td style="width:150px;border-bottom: dotted 1px #000;"></td>
                        </tr>
	</table>
                <table style="font-size:12px;">
                        <tr>
                                <td style="width:360px;"></td>
                                <td style="width:80px;">วันที่อนุมัติ</td>
                                <td style="width:70px;"></td>
                                <td style="width:10px;"></td>
                                <td style="width:80px;">วันที่รับ</td>
                                <td style="width:70px;"></td>
                        </tr>
	</table>
        </body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new \Mpdf\Mpdf(['mode' => 'th']);
$stylesheet .= file_get_contents('CSS/pdf.css');
$pdf->WriteHTML($stylesheet,1);
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>