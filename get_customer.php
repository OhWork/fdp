<?php
// ส่วนของการเชิ่อมต่อกับฐานข้อมูล
    include 'tools/db_tools.php';
    include 'connect.php';
    $q = $_GET["term"];

$pagesize = 10; // จำนวนรายการที่ต้องการแสดง
$find_field="customer_name"; // ฟิลที่ต้องการค้นหา
$rs = $db->conditions('customer JOIN provinces ON customer_provinces = provinces.provinces_id JOIN districts ON customer_districts = districts. districts_id JOIN subdistricts ON customer_subdistricts = subdistricts.subdistricts_id ',"locate('$q', $find_field) > 0 order by locate('$q', $find_field), $find_field limit $pagesize");
//$rs = $db->specifytable("*",$table_db,"locate('$q', $find_field ,status_status_id = '1') > 0 order by locate('$q', $find_field), $find_field limit $pagesize")->execute();
//while($row=mysqli_fetch_array($rs)) {
while( $row = $rs->moveNext_getRow('array')){
    $json_data[]=array(
        "id"=>$row['customer_id'],
        "label"=>$row['customer_name'],
        "value"=>$row['customer_name'],
        "add" => $row['customer_address'],
        "tel" => $row['customer_tel'],
        "subdis" => $row['subdistricts_name'],
        "dis" => $row['districts_name'],
        "pro" => $row['provinces_name'],
     );
}
$json= json_encode($json_data);
echo $json;
exit;
?>
