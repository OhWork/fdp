<?php

$db = new openConnection();
$db->db_name = "fdp_db";

if(!$db->connect()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>
