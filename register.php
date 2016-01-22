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
      $profile_pic   = urldecode($_POST['profile_pic']);
	  
	   $facebook=false;
	    if( isset($_POST['Type']) ){
		 $facebook=true;
		}
	   $res=isUserExisted($Email);
	  
	    if($res){
		  if($facebook){
		     updateUser( $Email, $Password, $Name,$Age,$Contact,$City,$State,$sex,$GcmId,$profile_pic);
		    getUserDetail($Email); 
			}
		  else
	        echo "user_exits";
		}		
	   else{
	   if($facebook){
          $res = storeFacebookUser( $Email, $Password, $Name,$Age,$Contact,$City,$State,$sex,$GcmId,$profile_pic);
		  }else
		  $res = storeUser( $Email, $Password, $Name,$Age,$Contact,$City,$State,$sex,$GcmId,$profile_pic);
	      getUserDetail($Email); 
	   }  
 ?>