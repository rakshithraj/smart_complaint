<?php 
 require_once('loader.php');
 
       $Email   = urldecode($_POST['Email']);
       $Password   = urldecode($_POST['Password']);
       $Name  = urldecode($_POST['Name']);
       $Age   = urldecode($_POST['Age']);
       $Contact   = urldecode($_POST['Contact']);
	    $City   = urldecode($_POST['City']);
		$State   = urldecode($_POST['State']);	 
		  $sex   = urldecode($_POST['sex']);
       $GcmId   = urldecode($_POST['GcmId']);
  
	   $res=isUserExisted($Email);
	 
	    if($res){
	    echo "user_exits";
		}
		
	 else{
       $res = storeUser( $Email, $Password, $Name,$Age,$Contact,$City,$State,$sex,$GcmId);
	   if($res)
	      echo "inserted";
		else
		 echo "insert_failed"; 
	   }  
 ?>