<?php
require_once('loader.php');
$tablename = $_GET["tablename"];
$start = $_GET["start"];
$end = $_GET["end"];


$result=mysql_query("SELECT * FROM ".$tablename." order by complaintId desc LIMIT ".$start.",".$end."") or die(mysql_error());
$jsonArray = array();
$total_records = mysql_num_rows($result);

if($total_records >= 1){
  while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
    $jsonArray[] = $row;
  }
}
$jsonObject = array('complaints' => $jsonArray);
echo json_encode($jsonObject);

                      
?>

