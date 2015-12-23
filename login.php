<?php 


 require_once('loader.php');
 
       $LoginEmail   = urldecode($_POST['Email']);
       $LoginPassword   = urldecode($_POST['Password']);

	   $res=login($LoginEmail,$LoginPassword);
	   if($res){
	   echo "valid user";
	   }else{
	   echo "invalid user";
	   }
	   
	   ?>