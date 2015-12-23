<?php
require_once('loader.php');
$id  = $_GET["id"];
$tablename = $_GET["tablename"];



$result=mysql_query("SELECT * FROM ".$tablename." WHERE complaintId = '$id'") or die(mysql_error());
 $status=-1;
while ($row = mysql_fetch_assoc($result))
              {
               $status=$row['status'];
			 
              }
    echo $status; 

                      
?>

