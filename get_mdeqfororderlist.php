<?php
// ส่วนของการเชิ่อมต่อกับฐานข้อมูล
    include 'tools/db_tools.php';
    include 'connect.php';
    $q = $_GET["term"];

$pagesize = 10; // จำนวนรายการที่ต้องการแสดง
$find_field="mdeq_code"; // ฟิลที่ต้องการค้นหา
$rs = $db->conditions('mdeq',"locate('$q', $find_field ,mdeq_enable = '1') > 0 order by locate('$q', $find_field), $find_field limit $pagesize");
//$rs = $db->specifytable("*",$table_db,"locate('$q', $find_field ,status_status_id = '1') > 0 order by locate('$q', $find_field), $find_field limit $pagesize")->execute();
//while($row=mysqli_fetch_array($rs)) {
while( $row = $rs->moveNext_getRow('array')){
    $json_data[]=array(
        "id"=>$row['mdeq_id'],
        "label"=>$row['mdeq_code']."(".$row['mdeq_name'].")",
        "name"=>$row['mdeq_name'],
        "unit"=>$row['mdeq_unit'],
        "price"=>$row['mdeq_price'],
        "code" =>$row['mdeq_code']
    );
}
$json= json_encode($json_data);
echo $json;
exit;
?>
