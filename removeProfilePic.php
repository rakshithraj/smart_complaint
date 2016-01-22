<?php
require_once('loader.php');
$User  = $_POST["User"];

$res = updateProfilePic($User,"");

if($res ){
echo "sucess";
}else{
echo "fail";
} 

                      
?>

