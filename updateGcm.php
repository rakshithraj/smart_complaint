<?php
require_once('loader.php');
 $newGCM=$_GET['newGCM'];
 $userId=$_GET['userId'];
mysql_query("UPDATE logintable SET GcmId='$newGCM' WHERE Email='$userId'");
?>