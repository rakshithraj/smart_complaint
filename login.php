<?php 


 require_once('loader.php');
 
       $LoginEmail   = urldecode($_POST['Email']);
       $LoginPassword   = urldecode($_POST['Password']);

	   login($LoginEmail,$LoginPassword);
	   
	   
	   ?>